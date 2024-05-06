<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    User
};

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::whereHas('role_user', function($q) {
            $q->whereHas('role', function($query) {
                $query->where('name', 'user');
            });
        });

        if($request->has('status')) {
            if( $request->status == 'active') {
                $users = $users->where('status', 1);
            } elseif( $request->status == 'inactive') {
                $users = $users->where('status', 0);
            } elseif( $request->status == 'deleted') {
                $users = $users->onlyTrashed();
            }

        }

        $data['users'] = $users->orderBy('created_at','desc')->paginate(25);
        return view('admin.users.index', $data);
    }

    public function deactivate_user(Request $request)
    {
        try{
            $user = User::withTrashed()->where('slug', $request->slug)->first();
            if(isset($user)) {
                if($user->status == 1) {
                    $user->status = 0;
                    $user->save();
                    $message = $user->full_name."'s account has deactivated successfully!";
                    $message_type = 'warning';
                } else {
                    $user->status = 1;
                    $user->save();
                    $message = $user->full_name."'s account has activated successfully!";
                    $message_type = 'success';
                }

                return response()->json([
                    'status' => 'success',
                    'message' => $message,
                    'message_type' => $message_type
                ], 200);

            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Something went wrong'
                ], 409);
            }

        } catch (Exception $e) {
            return response()->json([
                'status' => error,
                'message' => 'Something went wrong '.$e
            ], 409);
        }
    }

    public function delete(Request $request)
    {
        try{
            $user = User::where('slug', $request->slug)->first();
            if(isset($user)) {
                $message = $user->full_name."'s account has deleted successfully!";
                $user->delete();

                return response()->json([
                    'status' => 'success',
                    'message' => $message
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Something went wrong'
                ], 409);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => error,
                'message' => 'Something went wrong '.$e
            ], 409);
        }
    }

    public function restore(Request $request)
    {
        try{
            $user = User::withTrashed()->where('slug', $request->slug)->first();
            if(isset($user)) {
                $user->restore();
                $message = $user->full_name."'s account has restored successfully!";

                return response()->json([
                    'status' => 'success',
                    'message' => $message
                ], 200);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Something went wrong'
                ], 409);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => error,
                'message' => 'Something went wrong '.$e
            ], 409);
        }
    }
}

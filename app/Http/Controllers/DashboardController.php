<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    User,
    Order
};

class DashboardController extends Controller
{
    public function index()
    {
        $data['customers'] = User::whereHas('role_user', function ($q) {
            $q->where('role_id', 2);
        })->count();
        $data['orders'] = Order::count();

        return view('admin.dashboard', $data);
    }
}

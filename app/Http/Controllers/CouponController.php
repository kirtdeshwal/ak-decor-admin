<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    CouponCode
};

class CouponController extends Controller
{
    public function index()
    {
        $data['coupons'] = CouponCode::orderBy('created_at', 'desc')->paginate(25);
        return view('admin.coupons.index', $data);
    }
}

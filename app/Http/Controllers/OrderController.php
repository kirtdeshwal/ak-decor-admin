<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Order
};

class OrderController extends Controller
{
    public function index()
    {
        $data['orders'] = Order::orderBy('created_at', 'desc')->paginate(25);
        return view('admin.orders.index', $data);
    }
}

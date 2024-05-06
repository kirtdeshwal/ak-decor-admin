<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Product
};

class ProductController extends Controller
{
    public function index()
    {
        $data['products'] = Product::orderBy('created_at', 'desc')->paginate(25);
        return view('admin.products.index', $data);
    }
}

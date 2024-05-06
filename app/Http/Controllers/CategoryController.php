<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    ProductCategory
};

class CategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = ProductCategory::orderby('id')->paginate(25);
        return view('admin.categories.index', $data);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\ProductSubCategory;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'product_category_id');
    }

    public function sub_category()
    {
        return $this->hasMany(ProductSubCategory::class, 'product_category_id');
    }
}

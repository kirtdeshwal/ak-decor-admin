<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use App\Models\ProductVariant;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_category_id',
        'product_sub_category_id',
        'title',
        'brand',
        'availability',
        'weight',
        'length',
        'width',
        'height',
        'description',
        'featured',
        'slug'
    ];

    public function variants()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function sub_category()
    {
        return $this->belongsTo(ProductSubCategory::class, 'product_sub_category_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductVariant;

class ProductSpecification extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_variant_id',
        'key',
        'value',
        'slug'
    ];

    public function product_variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }
}

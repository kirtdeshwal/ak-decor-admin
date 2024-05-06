<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductVariant;
use App\Models\Currency;

class ProductPricing extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_variant_id',
        'base_price',
        'currency_id',
        'discount_percentage',
        'tax1_name',
        'tax1',
        'tax2_name',
        'tax2',
        'tax3_name',
        'tax3',
        'tax4_name',
        'tax4',
        'tax5_name',
        'tax5',
    ];

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function product_variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }
}

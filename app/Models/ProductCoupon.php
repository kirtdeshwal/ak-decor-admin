<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductVariant;
use App\Models\CouponCode;

class ProductCoupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_variant_id',
        'coupon_id'
    ];

    public function product_variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }

    public function coupon()
    {
        return $this->belongsTo(CouponCode::class, 'coupon_id');
    }
}

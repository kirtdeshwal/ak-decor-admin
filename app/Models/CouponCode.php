<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Currency;
use App\Models\ProductCoupon;

class CouponCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'coupon_code',
        'description',
        'discount_type',
        'minimum_order_amount',
        'maximum_discount_amount',
        'percentage_dicount',
        'currency_id',
        'flat_dicount',
        'buy_x_value',
        'get_y_value',
        'valid_from',
        'valid_to',
        'usage_limit_per_coupon',
        'usage_limit_per_customer',
        'usage_count',
        'coupon_status',
        'slug'
    ];

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'coupon_id');
    }

    public function coupon_products()
    {
        return $this->hasMany(ProductCoupon::class, 'coupon_id');
    }
}

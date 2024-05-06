<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BillingDetail;
use App\Models\CouponCode;
use App\Models\OrderItem;
use App\Models\Currency;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'billing_id',
        'tracking_number',
        'order_status',
        'payment_method',
        'payment_status',
        'shipping_method',
        'currency_id',
        'total_amount',
        'discount_amount',
        'tax_amount',
        'addition_amount',
        'shipping_amount',
        'coupon_id',
        'description',
        'order_date',
        'estimated_delivery_date',
        'date_shipped',
        'date_delivered',
        'refund_status',
        'refund_request_date',
        'amount_refunded_date',
        'slug'
    ];

    public function billing_detail()
    {
        return $this->belongsTo(BillingDetail::class, 'billing_id');
    }

    public function coupon()
    {
        return $this->belongsTo(CouponCode::class, 'coupon_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductVariant;
use App\Models\Order;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_variant_id',
        'quantity',
        'order_status',
        'total_amount',
        'discount_amount',
        'tax_amount',
        'addition_amount',
        'estimated_delivery_date',
        'date_shipped',
        'date_delivered',
        'refund_status',
        'refund_request_date',
        'amount_refunded_date',
        'slug'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product_variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }
}

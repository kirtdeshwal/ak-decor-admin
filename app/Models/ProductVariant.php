<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\AdditionalCharge;
use App\Models\ProductCoupon;
use App\Models\ProductPricing;
use App\Models\ProductSpecification;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'label',
        'sku',
        'stock_quantity',
        'barcode',
        'max_order_quantity',
        'description',
        'slug'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function additional_charges()
    {
        return $this->hasMany(AdditionalCharge::class, 'product_variant_id');
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class, 'product_variant_id');
    }

    public function variant_coupons()
    {
        return $this->hasMany(ProductCoupon::class, 'product_variant_id');
    }

    public function product_pricing()
    {
        return $this->hasOne(ProductPricing::class, 'product_variant_id');
    }

    public function variant_specifications()
    {
        return $this->hasMany(ProductSpecification::class, 'product_variant_id');
    }
}

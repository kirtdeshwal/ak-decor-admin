<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductVariant;
use App\Models\Currency;

class AdditionalCharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_variant_id',
        'charges_name',
        'amount',
        'currency_id',
    ];

    public function product_variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }
}

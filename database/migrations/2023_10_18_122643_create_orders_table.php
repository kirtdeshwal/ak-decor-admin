<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('billing_id');
            $table->string('tracking_number');
            $table->enum('order_status', ['Pending Payment', 'Processing', 'Shipped', 'Out for Delivery', 'Delivered', 'On Hold', 'Cancelled', 'Returned', 'Refunded', 'Partially Shipped', 'On Backorder', 'Pending Review', 'Completed', 'Payment Failed', 'Hold for Pickup'])->default('Pending Payment');
            $table->enum('payment_method', ['Card', 'PayPal', 'Upi', 'Net Banking']);
            $table->enum('payment_status', ['Pending', 'Paid', 'Unpaid', 'Failed'])->default('Pending');
            $table->enum('shipping_method', ['Standard Shipping', 'Express Shipping'])->default('Standard Shipping');
            $table->unsignedMediumInteger('currency_id');
            $table->float('total_amount');
            $table->float('discount_amount')->nullable()->default(0);
            $table->float('tax_amount')->nullable()->default(0);
            $table->float('addition_amount')->nullable()->default(0);
            $table->float('shipping_amount')->nullable()->default(0);
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->longText('description')->nullable();
            $table->date('order_date');
            $table->date('estimated_delivery_date');
            $table->date('date_shipped')->nullable();
            $table->date('date_delivered')->nullable();
            $table->enum('refund_status', ['Requested', 'Processing', 'Approved', 'Rejected', 'Pending Payment', 'Refunded', 'Partially Refunded', 'Cancelled', 'Completed', 'Review Required', 'Pending Customer Action', 'Error'])->nullable();
            $table->date('refund_request_date')->nullable();
            $table->date('amount_refunded_date')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('billing_id')->references('id')->on('billing_details')->onDelete('cascade');
            $table->foreign('coupon_id')->references('id')->on('coupon_codes')->onDelete('cascade');
            $table->foreign('currency_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

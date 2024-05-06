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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_variant_id');
            $table->integer('quantity');
            $table->enum('order_status', ['Pending Payment', 'Processing', 'Shipped', 'Out for Delivery', 'Delivered', 'On Hold', 'Cancelled', 'Returned', 'Refunded', 'Partially Shipped', 'On Backorder', 'Pending Review', 'Completed', 'Payment Failed', 'Hold for Pickup'])->default('Pending Payment');
            $table->float('total_amount');
            $table->float('discount_amount')->nullable()->default(0);
            $table->float('tax_amount')->nullable()->default(0);
            $table->float('addition_amount')->nullable()->default(0);
            $table->date('estimated_delivery_date');
            $table->date('date_shipped')->nullable();
            $table->date('date_delivered')->nullable();
            $table->enum('refund_status', ['Requested', 'Processing', 'Approved', 'Rejected', 'Pending Payment', 'Refunded', 'Partially Refunded', 'Cancelled', 'Completed', 'Review Required', 'Pending Customer Action', 'Error'])->nullable();
            $table->date('refund_request_date')->nullable();
            $table->date('amount_refunded_date')->nullable();
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_variant_id')->references('id')->on('product_variants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};

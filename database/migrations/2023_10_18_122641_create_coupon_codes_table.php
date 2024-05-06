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
        Schema::create('coupon_codes', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_code');
            $table->longText('description')->nullable();
            $table->enum('discount_type', ['Percentage Discount', 'Flat Discount', 'Free Shipping', 'By X Get Y Discount']);
            $table->float('minimum_order_amount')->nullable();
            $table->float('maximum_discount_amount')->nullable();
            $table->float('percentage_dicount')->nullable();
            $table->unsignedMediumInteger('currency_id');
            $table->float('flat_dicount')->nullable();
            $table->integer('buy_x_value')->nullable();
            $table->integer('get_y_value')->nullable();
            $table->dateTime('valid_from');
            $table->dateTime('valid_to');
            $table->integer('usage_limit_per_coupon')->nullable();
            $table->integer('usage_limit_per_customer')->nullable();
            $table->integer('usage_count')->default(0);
            $table->enum('coupon_status', ['Active', 'Expired', 'Disabled'])->default('Disabled');
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('currency_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_codes');
    }
};

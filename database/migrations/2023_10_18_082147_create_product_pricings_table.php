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
        Schema::create('product_pricings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_variant_id');
            $table->float('base_price');
            $table->unsignedMediumInteger('currency_id');
            $table->float('discount_percentage')->nullable();
            $table->string('tax1_name')->nullable();
            $table->float('tax1')->nullable();
            $table->string('tax2_name')->nullable();
            $table->float('tax2')->nullable();
            $table->string('tax3_name')->nullable();
            $table->float('tax3')->nullable();
            $table->string('tax4_name')->nullable();
            $table->float('tax4')->nullable();
            $table->string('tax5_name')->nullable();
            $table->float('tax5')->nullable();
            $table->timestamps();

            $table->foreign('product_variant_id')->references('id')->on('product_variants')->onDelete('cascade');
            $table->foreign('currency_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_pricings');
    }
};

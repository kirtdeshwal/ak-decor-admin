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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_category_id');
            $table->unsignedBigInteger('product_sub_category_id');
            $table->string('title');
            $table->string('brand');
            $table->enum('availability', ['In Stock', 'Out of Stock', 'Preorder'])->default('Out of Stock');
            $table->float('weight');
            $table->float('length');
            $table->float('width');
            $table->float('height');
            $table->longText('description')->nullable();
            $table->boolean('featured')->default(false);
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->foreign('product_sub_category_id')->references('id')->on('product_sub_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

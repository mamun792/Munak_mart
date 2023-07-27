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
            $table->string('product_name');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('vendor_id');
            $table->text('short_productDescription');
            $table->text('long_productDescription');
            $table->text('product_additional_information');
            $table->text('care_of_Instaction');
            $table->decimal('pursing_price', 10, 2);
            $table->decimal('regular_price', 10, 2);
            $table->decimal('discount', 5, 2);
            $table->decimal('discount_price', 10,2);
            $table->string('p_image');

            // $table->boolean('exchangeable')->default(false);
            // $table->boolean('refundable')->default(true);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('vendor_id')->references('id')->on('users');
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

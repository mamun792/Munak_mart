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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no');
            $table->integer('user_id');
            $table->integer('address_id');
            $table->string('cupon_name')->nullable();
            $table->integer('delivery_option');
            $table->string('payment_option');
            $table->decimal('sub_total', 10, 2);
            $table->integer('discount');
            $table->decimal('total_discount', 10, 2);
            $table->decimal('total_amount', 10, 2);
            $table->string('payment_status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};

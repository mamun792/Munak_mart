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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('coupon_title');
            $table->string('coupon_code')->unique();
            $table->date('coupon_start_date');
            $table->date('coupon_end_date');
            $table->integer('coupon_limit')->nullable();
            $table->integer('coupon_quantity');
            $table->enum('state', ['percent', 'fixed'])->default('percent');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};

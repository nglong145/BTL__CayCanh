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
            $table->id('OrderID');
            $table->unsignedBigInteger('CustomerID');
            $table->string('FullName', 255);
            $table->string('Address', 255);
            $table->string('Phone', 10);
            $table->decimal('Total', 18, 2);
            $table->string('status');
            $table->timestamps();
            $table->foreign('CustomerID')->references('id')->on('users')->onDelete('cascade');
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

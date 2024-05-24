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

        Schema::create('import_items', function (Blueprint $table) {
            $table->id('ImportItemID');
            $table->unsignedBigInteger('ImportID');
            $table->unsignedBigInteger('ProductID');
            $table->integer('Quantity');
            $table->decimal('Price', 10, 2);
            $table->timestamps();
            $table->foreign('ImportID')->references('ImportID')->on('imports')->onDelete('cascade');
            $table->foreign('ProductID')->references('ProductID')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('import_items');
    }
};

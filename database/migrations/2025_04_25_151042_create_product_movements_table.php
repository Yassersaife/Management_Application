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
        Schema::create('product_movements', function (Blueprint $table) {
            $table->string('movement_id')->primary();
            $table->string('from_location')->nullable();
            $table->string('to_location')->nullable();
            $table->string('product_id');
            $table->integer('qty');
            $table->timestamps();
            $table->foreign('from_location')->references('location_id')->on('locations')->nullOnDelete();
            $table->foreign('to_location')->references('location_id')->on('locations')->nullOnDelete();
            $table->foreign('product_id')->references('product_id')->on('products')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_movements');
    }
};

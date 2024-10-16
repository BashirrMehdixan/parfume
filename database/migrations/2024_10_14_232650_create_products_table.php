<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('brand_id')->constrained('brands')->onDelete('cascade');
            $table->string('gender')->default('unisex');
            $table->string('description')->nullable();
            $table->json('image');
            $table->decimal('price')->nullable();
            $table->decimal('discount')->nullable();
            $table->decimal('quantity');
            $table->string('stock')->nullable();
            $table->boolean('special_offer')->default(false);
            $table->boolean('best_selling')->default(false);
            $table->boolean('status')->default(true);
            $table->timestamps();
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

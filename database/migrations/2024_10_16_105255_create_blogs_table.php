<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('slug', 255)->unique();
            $table->json('image');
            $table->longText('description');
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('blog_categories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};

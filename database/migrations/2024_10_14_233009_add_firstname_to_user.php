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
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname')->after('name')->nullable();
            $table->string('lastname')->after('firstname')->nullable();
            $table->boolean('role_id')->after('lastname')->default(2);
            $table->date('birthdate')->after('role_id')->nullable();
            $table->string('gender')->after('birthdate')->nullable();
            $table->string('avatar')->after('gender')->nullable();
            $table->string('phone')->after('email')->nullable();
            $table->boolean('status')->after('phone')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};

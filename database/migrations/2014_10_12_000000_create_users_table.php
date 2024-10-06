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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->enum('gender',['Male','Female','Others']);
            $table->string('address')->nullable();
            $table->string('dob')->nullable();
            $table->string('contact')->nullable();
            $table->string('profile')->nullable();
            $table->enum('position',['admin','user'])->default('user');
            $table->string('email')->unique();
            $table->longText('summary')->nullable();
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

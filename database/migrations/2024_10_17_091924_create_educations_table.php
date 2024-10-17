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
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('degree_id');
            $table->unsignedBigInteger('field_id');
            $table->string('institute');
            $table->string('university');
            $table->unsignedBigInteger('grading_type_id');
            $table->unsignedBigInteger('joined_year_id');
            $table->unsignedBigInteger('passed_year_id')->nullable();
            $table->string('current_studying')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('degree_id')->references('id')->on('degrees')->onUpdate('cascade');
            $table->foreign('field_id')->references('id')->on('fields')->onUpdate('cascade');
            $table->foreign('grading_type_id')->references('id')->on('grading_types')->onUpdate('cascade');
            $table->foreign('joined_year_id')->references('id')->on('years')->onUpdate('cascade');
            $table->foreign('passed_year_id')->references('id')->on('years')->onUpdate('cascade');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educations');
    }
};

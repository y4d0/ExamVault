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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('school_name');
            $table->string('course_name');
            $table->integer('no_of_semesters');
        });

        Schema::table('courses', function (Blueprint $table) {
            $table->foreign('course_name')->references('course_name')->on('subjects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['course_name']);
        });
        Schema::dropIfExists('courses');
    }
};
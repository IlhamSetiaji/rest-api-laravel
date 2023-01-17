<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty_student', function (Blueprint $table) {
            // $table->id();
            $table->foreignId('faculty_id')->constrained('faculties')->onDelete('cascade')->onCascade('cascade');
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade')->onCascade('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculty_student');
    }
};

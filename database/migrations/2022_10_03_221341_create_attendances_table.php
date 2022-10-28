<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->nullable()->references('id')->on('students')->onDelete('cascade');
            $table->foreignId('level_id')->nullable()->references('id')->on('levels')->onDelete('cascade');
            $table->foreignId('classroom_id')->nullable()->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreignId('section_id')->nullable()->references('id')->on('sections')->onDelete('cascade');
            $table->foreignId('teacher_id')->nullable()->references('id')->on('teachers')->onDelete('cascade');
            $table->date('attendence_date');
            $table->boolean('attendence_status');
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
        Schema::dropIfExists('attendances');
    }
}

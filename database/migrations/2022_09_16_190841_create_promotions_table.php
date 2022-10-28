<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreignId('from_level')->unsigned();
            $table->foreign('from_level')->references('id')->on('levels')->onDelete('cascade');
            $table->foreignId('from_classroom')->unsigned();
            $table->foreign('from_classroom')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreignId('from_section')->unsigned();
            $table->foreign('from_section')->references('id')->on('sections')->onDelete('cascade');
            $table->foreignId('to_level')->unsigned();
            $table->foreign('to_level')->references('id')->on('levels')->onDelete('cascade');
            $table->foreignId('to_classroom')->unsigned();
            $table->foreign('to_classroom')->references('id')->on('classrooms')->onDelete('cascade');
            $table->foreignId('to_section')->unsigned();
            $table->foreign('to_section')->references('id')->on('sections')->onDelete('cascade');
            $table->string('academic_year');
            $table->string('academic_year_new');
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
        Schema::dropIfExists('promotions');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned()->nullable();
            $table->integer('exam_id')->unsigned()->nullable();
            $table->unsignedInteger('exam_result_id')->nullable();
            $table->integer('question_id')->unsigned()->nullable();
            $table->integer('option_id')->unsigned()->nullable();
            $table->index('exam_id');
            $table->index('exam_result_id');
            $table->foreign('exam_result_id')->references('id')->on('exam_results')->onDelete('cascade');
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
        Schema::dropIfExists('student_answers');
    }
}

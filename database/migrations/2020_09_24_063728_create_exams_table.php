<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('course_id')->nullable();
            $table->string('training_id')->nullable();
            $table->string('exam_title_en')->nullable();
            $table->string('exam_title_fr')->nullable();
            $table->mediumText('exam_description_en')->nullable();
            $table->mediumText('exam_description_fr')->nullable();
            $table->string('total_marks')->nullable();
            $table->string('time_duration')->nullable();
            $table->dateTime('exam_date')->nullable();
            $table->integer('total_subjective_question')->nullable();
            $table->integer('total_objective_question')->nullable();
            $table->integer('status')->nullable()->default(0);

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
        Schema::dropIfExists('exams');
    }
}

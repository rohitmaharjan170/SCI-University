<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('exam_id');
            $table->mediumText('question_title_en')->nullable();
            $table->mediumText('question_title_fr')->nullable();
            $table->mediumText('question_description_en')->nullable();
            $table->mediumText('question_description_fr')->nullable();
            $table->string('question_type')->nullable();
            $table->string('marks_value')->nullable();
            $table->integer('status')->nullable()->default(0);
            $table->index('exam_id');
            $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
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
        Schema::dropIfExists('questions');
    }
}

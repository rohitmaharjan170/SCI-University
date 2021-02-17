<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentSubmissionFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignment_submission_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('assignment_submission_id');
            $table->string('filename');
            $table->timestamps();

            $table->foreign('assignment_submission_id')->references('id')->on('assignment_submissions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignment_submission_files');
    }
}

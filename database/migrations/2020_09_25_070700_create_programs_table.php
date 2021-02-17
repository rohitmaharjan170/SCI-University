<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('category_id')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_fr')->nullable();
            $table->text('slug')->nullable();
            $table->string('image')->nullable();
            $table->string('video_url')->nullable();
            $table->mediumText('description_en')->nullable();
            $table->mediumText('description_fr')->nullable();
            $table->mediumText('short_description_en')->nullable();
            $table->mediumText('short_description_fr')->nullable();
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
        Schema::dropIfExists('programs');
    }
}

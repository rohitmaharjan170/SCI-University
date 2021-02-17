<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title_en')->nullable();
            $table->string('title_fr')->nullable();
            $table->text('slug')->nullable();
            $table->mediumText('short_description_en')->nullable();
            $table->mediumText('short_description_fr')->nullable();
            $table->longText('long_description_en')->nullable();
            $table->longText('long_description_fr')->nullable();
            $table->string('published_by')->nullable();
            $table->dateTime('published_date')->nullable();
            $table->string('image')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('presses');
    }
}

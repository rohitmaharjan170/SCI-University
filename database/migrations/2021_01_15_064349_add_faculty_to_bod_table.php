<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFacultyToBodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::table('board_of_directors', function (Blueprint $table) {
            $table->string('faculty')->nullable();

        });*/
        Schema::table('board_of_directors', function($table) {
            $table->string('faculty')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*Schema::table('board_of_directors', function (Blueprint $table) {
            $table->dropColumn('faculty');

        });*/

        Schema::table('board_of_directors', function($table) {
            $table->dropColumn('faculty');
        });
    }
}

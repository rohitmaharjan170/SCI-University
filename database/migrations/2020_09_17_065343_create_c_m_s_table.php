<?php

use App\models\CMS;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_m_s_s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('page_type')->nullable();
            $table->mediumText('content')->nullable();
            $table->string('status')->nullable()->default(1);
            $table->timestamps();
        });

        $cms = new CMS;
        $cms->page_type = 'terms_and_conditions';
        $cms->save();

        $cms = new CMS;
        $cms->page_type = 'about_us';
        $cms->save();

        $cms = new CMS;
        $cms->page_type = 'privacy_policy';
        $cms->save();

        $cms = new CMS;
        $cms->page_type = 'contact_us';
        $cms->save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_m_s_s');
    }
}

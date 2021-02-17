<?php

use App\models\SiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('welcome_message_en')->nullable();
            $table->string('welcome_message_fr')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('contact_hotline')->nullable();
            $table->string('contact_mobile')->nullable();
            $table->string('contact_company')->nullable();
            $table->string('contact_jobseeker')->nullable();
            $table->string('contact_url')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('website_name')->nullable();
            $table->string('primary_email')->nullable();
            $table->string('primary_address')->nullable();
            $table->string('primary_mobile')->nullable();
            $table->timestamps();
        });

        $siteSettings = new SiteSetting;
        $siteSettings->id = 1;
        $siteSettings->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_settings');
    }
}

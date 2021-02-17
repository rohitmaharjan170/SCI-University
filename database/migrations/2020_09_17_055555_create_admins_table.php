<?php

use App\models\Admin;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password',255);
            $table->boolean('is_super')->nullable()->default(0);
            $table->boolean('verified')->nullable()->default(0);
            $table->boolean('status')->nullable()->default(0);
            $table->string('verify_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // Admin::create([
        //     'name' => 'Super Admin',
        //     'email'=> 'admin@admin.com',
        //     'password' => bcrypt('secret'),
        //     'is_super' => true,
        //     'verified' => true,
        //     'status' => true,
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}

<?php

use Illuminate\Database\Seeder;

class UserPasswordResetsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_password_resets')->delete();
        
        
        
    }
}
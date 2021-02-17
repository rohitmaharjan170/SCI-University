<?php

use Illuminate\Database\Seeder;

class EmailResetsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('email_resets')->delete();
        
        
        
    }
}
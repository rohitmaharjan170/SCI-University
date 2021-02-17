<?php

use Illuminate\Database\Seeder;

class DonationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('donations')->delete();
        
        
        
    }
}
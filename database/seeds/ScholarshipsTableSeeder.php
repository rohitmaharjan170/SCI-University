<?php

use Illuminate\Database\Seeder;

class ScholarshipsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('scholarships')->delete();
        
        \DB::table('scholarships')->insert(array (
            0 => 
            array (
                'id' => 1,
                'first_name' => 'Amir',
                'last_name' => 'Thakuri',
                'country' => 'Nepal',
                'city' => 'Kathmandu',
                'email' => 'admin@developer.com',
                'phone' => '9860636192',
                'specialisation' => NULL,
                'facebook' => NULL,
                'instagram' => NULL,
                'twitter' => NULL,
                'linkedin' => NULL,
                'how_did_you_hear_us' => 'friends',
                'resume' => '5ff40d66473fa5ff40d66473fb.png',
                'status' => NULL,
                'created_at' => '2021-01-05 06:55:34',
                'updated_at' => '2021-01-05 06:55:34',
            ),
        ));
        
        
    }
}
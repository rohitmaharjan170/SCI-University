<?php

use Illuminate\Database\Seeder;

class TrainersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('trainers')->delete();
        
        \DB::table('trainers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'first_name' => 'Cliff',
                'last_name' => 'burton',
                'phone' => '9809999999',
                'email' => 'cliff@gmail.com',
                'password' => '$2y$10$eHHbzRWlWEpgdU2j5kaEyOjvpBJHLav60SAVCacxXnTcuQdQd4gza',
                'status' => 1,
                'email_verified' => 1,
                'verify_token' => '5ff4218d591515ff4218d59152',
                'remember_token' => 'g8N0cy0NsP1R72NvwDWIM0xyuEL4ReJH2hgN2R2YTIs9hFAIPS4CEfJjyEEF',
                'created_at' => '2021-01-05 08:21:33',
                'updated_at' => '2021-01-05 08:21:33',
            ),
        ));
        
        
    }
}
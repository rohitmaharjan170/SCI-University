<?php

use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('messages')->delete();
        
        \DB::table('messages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'from' => 1,
                'to' => 1,
                'message' => 'hii',
                'is_trainer' => 1,
                'seen' => 1,
                'created_at' => '2021-01-05 10:12:01',
                'updated_at' => '2021-01-05 10:12:26',
            ),
            1 => 
            array (
                'id' => 2,
                'from' => 1,
                'to' => 1,
                'message' => 'hello',
                'is_trainer' => 0,
                'seen' => 1,
                'created_at' => '2021-01-05 10:12:26',
                'updated_at' => '2021-01-05 10:12:32',
            ),
        ));
        
        
    }
}
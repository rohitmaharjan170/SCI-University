<?php

use Illuminate\Database\Seeder;

class TrainingImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('training_images')->delete();
        
        \DB::table('training_images')->insert(array (
            0 => 
            array (
                'id' => 1,
                'training_id' => 1,
                'image' => '5ff4216b841e65ff4216b841e81609834859.png',
                'created_at' => '2021-01-05 08:20:59',
                'updated_at' => '2021-01-05 08:20:59',
            ),
            1 => 
            array (
                'id' => 2,
                'training_id' => 1,
                'image' => '5ff4216b84e0c5ff4216b84e0e1609834859.png',
                'created_at' => '2021-01-05 08:20:59',
                'updated_at' => '2021-01-05 08:20:59',
            ),
        ));
        
        
    }
}
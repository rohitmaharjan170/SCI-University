<?php

use Illuminate\Database\Seeder;

class TrainingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('trainings')->delete();
        
        \DB::table('trainings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title_en' => 'python training',
                'title_fr' => 'pyhton training',
                'slug' => 'python-training-1',
                'image' => '5ff4216b832b45ff4216b832b61609834859.png',
                'video_url' => NULL,
                'description_en' => '<p>pyhton training for cheap</p>',
                'description_fr' => '<p>python training for cheap</p>',
                'short_description_en' => NULL,
                'short_description_fr' => NULL,
                'price' => 5000,
                'discount' => '100',
                'rating' => '5',
                'status' => 1,
                'created_at' => '2021-01-05 08:20:59',
                'updated_at' => '2021-01-05 08:20:59',
            ),
        ));
        
        
    }
}
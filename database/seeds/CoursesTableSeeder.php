<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('courses')->delete();
        
        \DB::table('courses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'program_id' => 1,
                'trainer_id' => NULL,
                'title_en' => 'NCC',
                'title_fr' => 'NCC',
                'slug' => 'ncc-1',
                'image' => '5ff41f62ec5305ff41f62ec5311609834338.png',
                'video_url' => 'https://www.youtube.com/embed/ix1Yg_MsmE0?list=RDix1Yg_MsmE0',
                'description_en' => '<p>net centric computin</p>',
                'description_fr' => '<p>net centric computin</p>',
                'short_description_en' => '<p>ncc</p>',
                'short_description_fr' => '<p>ncc</p>',
                'price' => 10000,
                'discount' => '2000',
                'rating' => '5',
                'status' => 1,
                'created_at' => '2021-01-05 08:12:18',
                'updated_at' => '2021-01-05 08:24:35',
            ),
        ));
        
        
    }
}
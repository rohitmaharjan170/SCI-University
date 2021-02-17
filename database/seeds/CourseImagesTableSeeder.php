<?php

use Illuminate\Database\Seeder;

class CourseImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('course_images')->delete();
        
        \DB::table('course_images')->insert(array (
            0 => 
            array (
                'id' => 1,
                'course_id' => 1,
                'image' => '5ff41f62ed5aa5ff41f62ed5ac1609834338.png',
                'created_at' => '2021-01-05 08:12:18',
                'updated_at' => '2021-01-05 08:12:18',
            ),
            1 => 
            array (
                'id' => 2,
                'course_id' => 1,
                'image' => '5ff422436939a5ff422436939b1609835075.png',
                'created_at' => '2021-01-05 08:24:35',
                'updated_at' => '2021-01-05 08:24:35',
            ),
            2 => 
            array (
                'id' => 3,
                'course_id' => 1,
                'image' => '5ff4224369b2f5ff4224369b311609835075.png',
                'created_at' => '2021-01-05 08:24:35',
                'updated_at' => '2021-01-05 08:24:35',
            ),
        ));
        
        
    }
}
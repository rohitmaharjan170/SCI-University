<?php

use Illuminate\Database\Seeder;

class CourseVideosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('course_videos')->delete();
        
        \DB::table('course_videos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'course_id' => 1,
                'video_url' => 'https://www.youtube.com/embed/ix1Yg_MsmE0?list=RDix1Yg_MsmE0',
                'created_at' => '2021-01-05 08:24:35',
                'updated_at' => '2021-01-05 08:24:35',
            ),
            1 => 
            array (
                'id' => 2,
                'course_id' => 1,
                'video_url' => 'https://www.youtube.com/embed/ix1Yg_MsmE0?list=RDix1Yg_MsmE0',
                'created_at' => '2021-01-05 08:24:35',
                'updated_at' => '2021-01-05 08:24:35',
            ),
        ));
        
        
    }
}
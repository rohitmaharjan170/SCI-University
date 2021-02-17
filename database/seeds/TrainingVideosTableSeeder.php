<?php

use Illuminate\Database\Seeder;

class TrainingVideosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('training_videos')->delete();
        
        \DB::table('training_videos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'training_id' => 1,
                'video_url' => 'https://www.youtube.com/embed/ix1Yg_MsmE0?list=RDix1Yg_MsmE0',
                'created_at' => '2021-01-05 08:20:59',
                'updated_at' => '2021-01-05 08:20:59',
            ),
        ));
        
        
    }
}
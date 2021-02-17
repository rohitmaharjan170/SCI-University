<?php

use Illuminate\Database\Seeder;

class ProgramVideosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('program_videos')->delete();
        
        \DB::table('program_videos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'program_id' => 1,
                'video_url' => 'https://www.youtube.com/embed/hF1BkYrAqr4?list=RDhF1BkYrAqr4',
                'created_at' => '2021-01-05 08:10:47',
                'updated_at' => '2021-01-05 08:10:47',
            ),
        ));
        
        
    }
}
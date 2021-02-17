<?php

use Illuminate\Database\Seeder;

class ProgramImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('program_images')->delete();
        
        \DB::table('program_images')->insert(array (
            0 => 
            array (
                'id' => 1,
                'program_id' => 1,
                'image' => '5ff41f07ae78e5ff41f07ae78f1609834247.png',
                'created_at' => '2021-01-05 08:10:47',
                'updated_at' => '2021-01-05 08:10:47',
            ),
            1 => 
            array (
                'id' => 2,
                'program_id' => 1,
                'image' => '5ff41f07af49d5ff41f07af49e1609834247.png',
                'created_at' => '2021-01-05 08:10:47',
                'updated_at' => '2021-01-05 08:10:47',
            ),
        ));
        
        
    }
}
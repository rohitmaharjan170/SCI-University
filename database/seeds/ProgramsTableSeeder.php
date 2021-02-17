<?php

use Illuminate\Database\Seeder;

class ProgramsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('programs')->delete();
        
        \DB::table('programs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_id' => 1,
                'title_en' => 'BSC. CSIT',
                'title_fr' => 'BSC. CSIT',
                'slug' => 'bsc-csit-1',
                'image' => '5ff41f07ad9645ff41f07ad9651609834247.png',
                'video_url' => NULL,
                'description_en' => '<p>BSC. CSIT is the latest course of&nbsp; IT provided by TU Unicersity.</p>',
                'description_fr' => '<p>BSC. CSIT is the latest course of&nbsp; IT provided by TU Unicersity.</p>',
                'short_description_en' => '<p>BSC. CSIT is the latest course of&nbsp; IT provided by TU Unicersity.</p>',
                'short_description_fr' => '<p>BSC. CSIT is the latest course of&nbsp; IT provided by TU Unicersity.</p>',
                'status' => 1,
                'created_at' => '2021-01-05 08:10:47',
                'updated_at' => '2021-01-05 08:10:47',
            ),
        ));
        
        
    }
}
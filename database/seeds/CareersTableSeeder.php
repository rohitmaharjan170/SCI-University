<?php

use Illuminate\Database\Seeder;

class CareersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('careers')->delete();
        
        \DB::table('careers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title_en' => 'Career Consultation',
                'title_fr' => 'Career Consulation',
                'description_en' => '<p>best carrer consulation in the town where you get to decide your future</p>',
                'description_fr' => '<p>best carrer consulation in the town where you get to decide your future</p>',
                'status' => 1,
                'created_at' => '2021-01-05 10:38:03',
                'updated_at' => '2021-01-05 10:38:03',
            ),
        ));
        
        
    }
}
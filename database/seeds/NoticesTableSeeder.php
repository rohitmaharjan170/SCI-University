<?php

use Illuminate\Database\Seeder;

class NoticesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('notices')->delete();
        
        \DB::table('notices')->insert(array (
            0 => 
            array (
                'id' => 6,
                'title_en' => 'notice 1',
                'title_fr' => 'notice 1',
                'description_en' => NULL,
                'description_fr' => NULL,
                'image' => '5fe04d7b68bea5fe04d7b68bed1608535419.png',
                'status' => 1,
                'created_at' => '2020-12-21 07:23:39',
                'updated_at' => '2020-12-21 07:23:39',
            ),
        ));
        
        
    }
}
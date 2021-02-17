<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name_en' => 'Bachelor',
                'name_fr' => 'Bachelor',
                'slug' => 'bachelor-1',
                'image' => '5ff41e8b7cf775ff41e8b7cf791609834123.png',
                'status' => 1,
                'created_at' => '2021-01-05 08:08:43',
                'updated_at' => '2021-01-05 08:08:43',
            ),
        ));
        
        
    }
}
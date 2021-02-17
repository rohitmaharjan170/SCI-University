<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tags')->delete();
        
        \DB::table('tags')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'c#',
                'created_at' => '2021-01-05 08:21:43',
                'updated_at' => '2021-01-05 08:21:43',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'pyhton',
                'created_at' => '2021-01-05 08:21:50',
                'updated_at' => '2021-01-05 08:21:50',
            ),
        ));
        
        
    }
}
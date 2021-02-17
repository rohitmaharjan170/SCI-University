<?php

use Illuminate\Database\Seeder;

class GalleryImagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('gallery_images')->delete();
        
        \DB::table('gallery_images')->insert(array (
            0 => 
            array (
                'id' => 1,
                'gallery_id' => 10,
                'image' => '5ff412a269f2d5ff412a269f2f1609831074.png',
                'created_at' => '2021-01-05 07:17:54',
                'updated_at' => '2021-01-05 07:17:54',
            ),
            1 => 
            array (
                'id' => 2,
                'gallery_id' => 10,
                'image' => '5ff412a26aec95ff412a26aecb1609831074.png',
                'created_at' => '2021-01-05 07:17:54',
                'updated_at' => '2021-01-05 07:17:54',
            ),
            2 => 
            array (
                'id' => 3,
                'gallery_id' => 10,
                'image' => '5ff412a26b2225ff412a26b2241609831074.png',
                'created_at' => '2021-01-05 07:17:54',
                'updated_at' => '2021-01-05 07:17:54',
            ),
        ));
        
        
    }
}
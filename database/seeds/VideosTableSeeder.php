<?php

use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('videos')->delete();
        
        \DB::table('videos')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title_en' => 'Video 1',
                'title_fr' => NULL,
                'description_en' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi facilisis elementum nisl, ac dignissim massa laoreet ut. Pellentesque ultrices arcu metus, consequat malesuada libero dignissim eu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris interdum quis ipsum faucibus tristique. Fusce nec elit egestas, tempus eros vel, tincidunt metus. Cras rhoncus imperdiet diam nec convallis. Mauris eget lacus at nunc gravida lobortis tincidunt commodo sapien. Quisque nec odio auctor, facilisis ex in, pellentesque ante. Donec at nulla sed augue vestibulum hendrerit. Quisque non accumsan velit. In non fermentum est. Maecenas ut nunc purus. Morbi sagittis ornare leo, quis varius tellus finibus et. Praesent at interdum arcu. Etiam et turpis ac lacus euismod convallis.</p>',
                'description_fr' => NULL,
                'url' => 'https://www.youtube.com/embed/kzURiUQdPyY',
                'show_in_homepage' => 1,
                'status' => 1,
                'created_at' => '2020-12-08 08:29:02',
                'updated_at' => '2020-12-08 08:29:02',
            ),
            1 => 
            array (
                'id' => 2,
                'title_en' => 'Video 2',
                'title_fr' => NULL,
                'description_en' => NULL,
                'description_fr' => NULL,
                'url' => 'https://www.youtube.com/embed/s2_vYYa9mcc',
                'show_in_homepage' => 1,
                'status' => 1,
                'created_at' => '2020-12-08 08:29:37',
                'updated_at' => '2020-12-08 08:30:31',
            ),
            2 => 
            array (
                'id' => 3,
                'title_en' => 'Veido 3',
                'title_fr' => NULL,
                'description_en' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi facilisis elementum nisl, ac dignissim massa laoreet ut. Pellentesque ultrices arcu metus, consequat malesuada libero dignissim eu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris interdum quis ipsum faucibus tristique. Fusce nec elit egestas, tempus eros vel, tincidunt metus. Cras rhoncus imperdiet diam nec convallis. Mauris eget lacus at nunc gravida lobortis tincidunt commodo sapien. Quisque nec odio auctor, facilisis ex in, pellentesque ante. Donec at nulla sed augue vestibulum hendrerit. Quisque non accumsan velit. In non fermentum est. Maecenas ut nunc purus. Morbi sagittis ornare leo, quis varius tellus finibus et. Praesent at interdum arcu. Etiam et turpis ac lacus euismod convallis.</p>',
                'description_fr' => NULL,
                'url' => 'https://www.youtube.com/embed/SYQhnAiwGZA?list=RDix1Yg_MsmE0',
                'show_in_homepage' => 1,
                'status' => 1,
                'created_at' => '2020-12-08 08:31:26',
                'updated_at' => '2020-12-08 08:31:26',
            ),
            3 => 
            array (
                'id' => 4,
                'title_en' => 'Video 4',
                'title_fr' => NULL,
                'description_en' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi facilisis elementum nisl, ac dignissim massa laoreet ut. Pellentesque ultrices arcu metus, consequat malesuada libero dignissim eu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris interdum quis ipsum faucibus tristique. Fusce nec elit egestas, tempus eros vel, tincidunt metus. Cras rhoncus imperdiet diam nec convallis. Mauris eget lacus at nunc gravida lobortis tincidunt commodo sapien. Quisque nec odio auctor, facilisis ex in, pellentesque ante. Donec at nulla sed augue vestibulum hendrerit. Quisque non accumsan velit. In non fermentum est. Maecenas ut nunc purus. Morbi sagittis ornare leo, quis varius tellus finibus et. Praesent at interdum arcu. Etiam et turpis ac lacus euismod convallis.</p>',
                'description_fr' => NULL,
                'url' => 'https://www.youtube.com/embed/X2Xm8Ps25WA',
                'show_in_homepage' => 1,
                'status' => 1,
                'created_at' => '2020-12-08 08:32:43',
                'updated_at' => '2020-12-08 08:32:43',
            ),
            4 => 
            array (
                'id' => 5,
                'title_en' => 'Video 5',
                'title_fr' => NULL,
                'description_en' => NULL,
                'description_fr' => NULL,
                'url' => 'https://www.youtube.com/embed/lN0wQQfGIFU',
                'show_in_homepage' => 1,
                'status' => 1,
                'created_at' => '2020-12-08 08:33:37',
                'updated_at' => '2020-12-08 08:33:37',
            ),
            5 => 
            array (
                'id' => 6,
                'title_en' => 'video 6',
                'title_fr' => NULL,
                'description_en' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi facilisis elementum nisl, ac dignissim massa laoreet ut. Pellentesque ultrices arcu metus, consequat malesuada libero dignissim eu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris interdum quis ipsum faucibus tristique. Fusce nec elit egestas, tempus eros vel, tincidunt metus. Cras rhoncus imperdiet diam nec convallis. Mauris eget lacus at nunc gravida lobortis tincidunt commodo sapien. Quisque nec odio auctor, facilisis ex in, pellentesque ante. Donec at nulla sed augue vestibulum hendrerit. Quisque non accumsan velit. In non fermentum est. Maecenas ut nunc purus. Morbi sagittis ornare leo, quis varius tellus finibus et. Praesent at interdum arcu. Etiam et turpis ac lacus euismod convallis.</p>',
                'description_fr' => NULL,
                'url' => 'https://www.youtube.com/embed/mkuxs3YlQFM',
                'show_in_homepage' => 1,
                'status' => 1,
                'created_at' => '2020-12-08 08:35:41',
                'updated_at' => '2020-12-08 08:35:41',
            ),
            6 => 
            array (
                'id' => 7,
                'title_en' => 'Video 7',
                'title_fr' => NULL,
                'description_en' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi facilisis elementum nisl, ac dignissim massa laoreet ut. Pellentesque ultrices arcu metus, consequat malesuada libero dignissim eu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris interdum quis ipsum faucibus tristique. Fusce nec elit egestas, tempus eros vel, tincidunt metus. Cras rhoncus imperdiet diam nec convallis. Mauris eget lacus at nunc gravida lobortis tincidunt commodo sapien. Quisque nec odio auctor, facilisis ex in, pellentesque ante. Donec at nulla sed augue vestibulum hendrerit. Quisque non accumsan velit. In non fermentum est. Maecenas ut nunc purus. Morbi sagittis ornare leo, quis varius tellus finibus et. Praesent at interdum arcu. Etiam et turpis ac lacus euismod convallis.</p>',
                'description_fr' => NULL,
                'url' => 'https://www.youtube.com/embed/GrlAInfP990',
                'show_in_homepage' => 1,
                'status' => 1,
                'created_at' => '2020-12-08 08:36:24',
                'updated_at' => '2020-12-08 08:36:24',
            ),
        ));
        
        
    }
}
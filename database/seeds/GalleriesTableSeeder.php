<?php

use Illuminate\Database\Seeder;

class GalleriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('galleries')->delete();
        
        \DB::table('galleries')->insert(array (
            0 => 
            array (
                'id' => 2,
                'title_en' => 'University Convocation 2020',
                'title_fr' => NULL,
                'slug' => NULL,
                'description_en' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi facilisis elementum nisl, ac dignissim massa laoreet ut. Pellentesque ultrices arcu metus, consequat malesuada libero dignissim eu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris interdum quis ipsum faucibus tristique. Fusce nec elit egestas, tempus eros vel, tincidunt metus. Cras rhoncus imperdiet diam nec convallis. Mauris eget lacus at nunc gravida lobortis tincidunt commodo sapien. Quisque nec odio auctor, facilisis ex in, pellentesque ante. Donec at nulla sed augue vestibulum hendrerit. Quisque non accumsan velit. In non fermentum est. Maecenas ut nunc purus. Morbi sagittis ornare leo, quis varius tellus finibus et. Praesent at interdum arcu. Etiam et turpis ac lacus euismod convallis.</p>',
                'description_fr' => NULL,
                'image' => '5fc763461380c5fc763461380e1606902598.png',
                'status' => 1,
                'created_at' => '2020-12-02 07:41:21',
                'updated_at' => '2020-12-08 08:17:01',
            ),
            1 => 
            array (
                'id' => 3,
                'title_en' => 'Fall Intake Orienation 2020',
                'title_fr' => NULL,
                'slug' => NULL,
                'description_en' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi facilisis elementum nisl, ac dignissim massa laoreet ut. Pellentesque ultrices arcu metus, consequat malesuada libero dignissim eu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris interdum quis ipsum faucibus tristique. Fusce nec elit egestas, tempus eros vel, tincidunt metus. Cras rhoncus imperdiet diam nec convallis. Mauris eget lacus at nunc gravida lobortis tincidunt commodo sapien. Quisque nec odio auctor, facilisis ex in, pellentesque ante. Donec at nulla sed augue vestibulum hendrerit. Quisque non accumsan velit. In non fermentum est. Maecenas ut nunc purus. Morbi sagittis ornare leo, quis varius tellus finibus et. Praesent at interdum arcu. Etiam et turpis ac lacus euismod convallis.</p>',
                'description_fr' => NULL,
                'image' => '5fc7667bbc2865fc7667bbc2881606903419.jpg',
                'status' => 1,
                'created_at' => '2020-12-02 10:03:39',
                'updated_at' => '2020-12-08 08:16:53',
            ),
            2 => 
            array (
                'id' => 4,
                'title_en' => 'College Tour',
                'title_fr' => NULL,
                'slug' => NULL,
                'description_en' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi facilisis elementum nisl, ac dignissim massa laoreet ut. Pellentesque ultrices arcu metus, consequat malesuada libero dignissim eu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris interdum quis ipsum faucibus tristique. Fusce nec elit egestas, tempus eros vel, tincidunt metus. Cras rhoncus imperdiet diam nec convallis. Mauris eget lacus at nunc gravida lobortis tincidunt commodo sapien. Quisque nec odio auctor, facilisis ex in, pellentesque ante. Donec at nulla sed augue vestibulum hendrerit. Quisque non accumsan velit. In non fermentum est. Maecenas ut nunc purus. Morbi sagittis ornare leo, quis varius tellus finibus et. Praesent at interdum arcu. Etiam et turpis ac lacus euismod convallis.</p>',
                'description_fr' => NULL,
                'image' => '5fc76c35e972e5fc76c35e97301606904885.jpg',
                'status' => 1,
                'created_at' => '2020-12-02 10:28:05',
                'updated_at' => '2020-12-08 08:16:44',
            ),
            3 => 
            array (
                'id' => 6,
                'title_en' => 'Python Developer Training',
                'title_fr' => NULL,
                'slug' => NULL,
                'description_en' => '<p>5 days Basic Workshop training</p>',
                'description_fr' => NULL,
                'image' => '5fc884741e87e5fc884741e8801606976628.jpg',
                'status' => 1,
                'created_at' => '2020-12-03 06:23:48',
                'updated_at' => '2020-12-03 06:23:48',
            ),
            4 => 
            array (
                'id' => 7,
                'title_en' => 'Site Survey',
                'title_fr' => NULL,
                'slug' => NULL,
                'description_en' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi facilisis elementum nisl, ac dignissim massa laoreet ut. Pellentesque ultrices arcu metus, consequat malesuada libero dignissim eu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Mauris interdum quis ipsum faucibus tristique. Fusce nec elit egestas, tempus eros vel, tincidunt metus. Cras rhoncus imperdiet diam nec convallis. Mauris eget lacus at nunc gravida lobortis tincidunt commodo sapien. Quisque nec odio auctor, facilisis ex in, pellentesque ante. Donec at nulla sed augue vestibulum hendrerit. Quisque non accumsan velit. In non fermentum est. Maecenas ut nunc purus. Morbi sagittis ornare leo, quis varius tellus finibus et. Praesent at interdum arcu. Etiam et turpis ac lacus euismod convallis.</p>',
                'description_fr' => NULL,
                'image' => '5fc89a2e00fcc5fc89a2e00fce1606982190.jpg',
                'status' => 1,
                'created_at' => '2020-12-03 07:56:30',
                'updated_at' => '2020-12-08 08:16:23',
            ),
            5 => 
            array (
                'id' => 8,
                'title_en' => 'test gallery',
                'title_fr' => 'test gallery',
                'slug' => NULL,
                'description_en' => '<p>test gallery</p>',
                'description_fr' => '<p>test gallery</p>',
                'image' => '5fdf2644110bc5fdf2644110bd1608459844.jpg',
                'status' => 1,
                'created_at' => '2020-12-20 10:24:04',
                'updated_at' => '2020-12-20 10:24:04',
            ),
            6 => 
            array (
                'id' => 9,
                'title_en' => 'Remember SCI Education for you bright future',
                'title_fr' => 'Remember SCI Education for you bright future',
                'slug' => NULL,
                'description_en' => '<p>Remember SCI Education for you bright future</p>',
                'description_fr' => '<p>Remember SCI Education for you bright future</p>',
                'image' => '5fe02e099f8445fe02e099f8451608527369.jpg',
                'status' => 1,
                'created_at' => '2020-12-21 05:09:29',
                'updated_at' => '2020-12-21 05:09:29',
            ),
            7 => 
            array (
                'id' => 10,
                'title_en' => 'latest galley',
                'title_fr' => 'latest gallert',
                'slug' => 'latest-galley-10',
                'description_en' => '<p>this is a test latest gallery fot testing slug updated</p>',
                'description_fr' => '<p>this is a test latest gallery fot testing slug updated</p>',
                'image' => '5ff412a268e035ff412a268e041609831074.png',
                'status' => 1,
                'created_at' => '2021-01-05 07:17:54',
                'updated_at' => '2021-01-05 07:17:54',
            ),
        ));
        
        
    }
}
<?php

use Illuminate\Database\Seeder;

class TestimonialsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('testimonials')->delete();
        
        \DB::table('testimonials')->insert(array (
            0 => 
            array (
                'id' => 5,
                'name' => 'Emma Staples',
                'title_en' => 'Social media love…  ',
                'title_fr' => NULL,
                'body_en' => '<p>You guys are the best! Keep up the great work!</p>',
                'body_fr' => NULL,
                'image' => '5fc75dea7a2435fc75dea7a2451606901226.png',
                'status' => 1,
                'created_at' => '2020-12-02 09:27:06',
                'updated_at' => '2020-12-02 09:27:06',
            ),
            1 => 
            array (
                'id' => 6,
                'name' => 'Cliff Burton',
                'title_en' => 'Batch 2018, BSW',
                'title_fr' => NULL,
                'body_en' => '<p>One of the best college... Every teacher is so friendly and helpful !!!!</p>',
                'body_fr' => NULL,
                'image' => '5fc75f11de2d75fc75f11de2d81606901521.png',
                'status' => 1,
                'created_at' => '2020-12-02 09:32:01',
                'updated_at' => '2020-12-02 09:32:23',
            ),
            2 => 
            array (
                'id' => 7,
                'name' => 'Lemmy Kilminster',
                'title_en' => 'Software Developer, Batch 2010',
                'title_fr' => NULL,
                'body_en' => '<p>Great College with proper resources... I miss old days</p>',
                'body_fr' => NULL,
                'image' => '5fc75f7d9c7ad5fc75f7d9c7af1606901629.png',
                'status' => 1,
                'created_at' => '2020-12-02 09:33:49',
                'updated_at' => '2020-12-02 09:33:49',
            ),
            3 => 
            array (
                'id' => 9,
                'name' => 'Lans Stewart',
                'title_en' => 'MBA, Batch 2010',
                'title_fr' => NULL,
                'body_en' => '<p>One of the best university to graduate from. Hope to see more graduates in the market from here.</p>',
                'body_fr' => NULL,
                'image' => '5fc8706fe0c285fc8706fe0c2a1606971503.jpg',
                'status' => 1,
                'created_at' => '2020-12-03 04:58:23',
                'updated_at' => '2020-12-03 04:58:23',
            ),
            4 => 
            array (
                'id' => 10,
                'name' => 'Chadwick Boaseman',
                'title_en' => 'Civil Engineering, Batch 2012',
                'title_fr' => NULL,
                'body_en' => '<p>Good Luck Peeps.</p>',
                'body_fr' => NULL,
                'image' => '5fc870d13e9df5fc870d13e9e01606971601.jpg',
                'status' => 1,
                'created_at' => '2020-12-03 05:00:01',
                'updated_at' => '2020-12-03 05:00:01',
            ),
            5 => 
            array (
                'id' => 11,
                'name' => 'Diana Ross',
                'title_en' => 'Construction Management, B.Sc. Batch 2017',
                'title_fr' => NULL,
                'body_en' => '<p>Great environment to study and learn.</p>',
                'body_fr' => NULL,
                'image' => '5fcf31ef8f9845fcf31ef8f9861607414255.png',
                'status' => 1,
                'created_at' => '2020-12-03 05:05:59',
                'updated_at' => '2020-12-08 07:57:35',
            ),
            6 => 
            array (
                'id' => 12,
                'name' => 'Jenny Hudson',
                'title_en' => 'Construction Management, B.Sc. Batch 2017',
                'title_fr' => NULL,
                'body_en' => '<p>Great Environment.</p>',
                'body_fr' => NULL,
                'image' => '5fcf319c886d45fcf319c886d51607414172.png',
                'status' => 1,
                'created_at' => '2020-12-03 07:34:24',
                'updated_at' => '2020-12-08 07:56:12',
            ),
            7 => 
            array (
                'id' => 13,
                'name' => 'Jisso Black',
                'title_en' => 'Civil Engineering, Batch 2012',
                'title_fr' => NULL,
                'body_en' => '<p>Good Education with great career.</p>',
                'body_fr' => NULL,
                'image' => '5fcf3191b143e5fcf3191b143f1607414161.png',
                'status' => 1,
                'created_at' => '2020-12-03 07:35:33',
                'updated_at' => '2020-12-08 07:56:01',
            ),
            8 => 
            array (
                'id' => 14,
                'name' => 'Rose payne',
                'title_en' => 'Masters Degrees in Agriculture, Batch 2011',
                'title_fr' => NULL,
                'body_en' => '<p>Excellent University throughout the city.</p>',
                'body_fr' => NULL,
                'image' => '5fcf31884d1c75fcf31884d1c81607414152.png',
                'status' => 1,
                'created_at' => '2020-12-03 07:36:42',
                'updated_at' => '2020-12-08 07:55:52',
            ),
        ));
        
        
    }
}
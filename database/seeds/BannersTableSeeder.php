<?php

use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('banners')->delete();
        
        \DB::table('banners')->insert(array (
            0 => 
            array (
                'id' => 19,
                'title_en' => 'Remember SCI Education for you bright future',
                'title_fr' => 'Remember SCI Education for you bright future',
                'description_en' => '<p>World Class education served you by SCI educarion</p>',
                'description_fr' => '<p>World Class education served you by SCI educarion</p>',
                'image' => '5fe04ee3283415fe04ee3283421608535779.png',
                'video_url' => NULL,
                'status' => 1,
                'created_at' => '2020-12-20 10:07:32',
                'updated_at' => '2020-12-21 07:29:39',
            ),
            1 => 
            array (
                'id' => 20,
                'title_en' => 'Remember SCI Education for you bright futuree',
                'title_fr' => 'Remember SCI Education for you bright futuree',
                'description_en' => '<p>The most popular majors at <strong>SCI Education&nbsp;</strong>&nbsp;include: Social Sciences, General; Biology/Biological Sciences, General; Mathematics, General; Computer Science; and History, General. The average freshman retention rate, an indicator of student satisfaction, is 97%.</p>',
                'description_fr' => '<p>The most popular majors at <strong>SCI Education&nbsp;</strong>&nbsp;include: Social Sciences, General; Biology/Biological Sciences, General; Mathematics, General; Computer Science; and History, General. The average freshman retention rate, an indicator of student satisfaction, is 97%.</p>',
                'image' => '5fe05033cc1275fe05033cc1291608536115.png',
                'video_url' => NULL,
                'status' => 1,
                'created_at' => '2020-12-20 10:09:13',
                'updated_at' => '2020-12-21 07:35:15',
            ),
        ));
        
        
    }
}
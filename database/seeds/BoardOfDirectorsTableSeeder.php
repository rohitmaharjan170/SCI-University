<?php

use Illuminate\Database\Seeder;

class BoardOfDirectorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('board_of_directors')->delete();
        
        \DB::table('board_of_directors')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'Jeff Hudson',
                'designation' => 'CEO',
                'short_description_en' => '<p>The responsibilities of an organization&#39;s CEO are set by the organization&#39;s&nbsp;<a href="https://en.wikipedia.org/wiki/Board_of_directors">board of directo</a>r&nbsp;or other authority</p>',
                'short_description_fr' => NULL,
                'image' => '5fc77d36348b25fc77d36348b31606909238.png',
                'status' => 1,
                'created_at' => '2020-12-02 11:40:38',
                'updated_at' => '2020-12-02 11:42:12',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Dan E. Wells, Ph.D.',
                'designation' => 'COO',
                'short_description_en' => '<p>This is an exciting time of renewal and development within the College. Of the 14 academic colleges, NSM leads the University in research expenditures, is second in student enrollment and is integral to the University&#39;s past successes and future directions.</p>

<p>All indicators of success are on the rise &ndash; undergraduate enrollment and achievement, graduate education and research, faculty success in garnering sponsored research, and national recognition of NSM excellence through awards to our students and faculty. Our highest priority is to prepare the next generation of scientists to solve global health, energy and environmental challenges while providing the training our students need to compete and excel in the workforce.</p>',
                'short_description_fr' => NULL,
                'image' => '5fc86f1d779035fc86f1d779041606971165.jpg',
                'status' => 1,
                'created_at' => '2020-12-03 04:52:45',
                'updated_at' => '2020-12-03 04:53:29',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'Alexis Jordan',
                'designation' => 'Senior Accountant',
                'short_description_en' => NULL,
                'short_description_fr' => NULL,
                'image' => '5fd5d73b3df795fd5d73b3df7b1607849787.pdf',
                'status' => 1,
                'created_at' => '2020-12-03 07:32:14',
                'updated_at' => '2020-12-13 08:56:27',
            ),
        ));
        
        
    }
}
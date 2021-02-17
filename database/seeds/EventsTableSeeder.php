<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('events')->delete();
        
        \DB::table('events')->insert(array (
            0 => 
            array (
                'id' => 2,
                'title_en' => 'Online Teacher-Parents Meeting',
                'title_fr' => NULL,
                'slug' => NULL,
                'description_en' => '<p>Due to pandamic, we have conducted online Teacher-Parents Meeting where Parents can discuss the overview of their childern</p>',
                'description_fr' => NULL,
                'image' => '5fc759820d4635fc759820d4651606900098.png',
                'status' => 1,
                'created_at' => '2020-12-02 07:38:07',
                'updated_at' => '2020-12-02 09:08:50',
            ),
            1 => 
            array (
                'id' => 3,
                'title_en' => 'Student Orientation for Fall Season',
                'title_fr' => NULL,
                'slug' => NULL,
                'description_en' => '<p>We have organized on orientaion programme for the newly admitted student for fall intake.</p>

<p>The orientation will be held with proper social distancing and precaution.</p>

<p>&nbsp;</p>

<p>Venue: Royal Banquets</p>

<p>TIme: 2 PM sharp</p>

<p>&nbsp;</p>',
                'description_fr' => NULL,
                'image' => '5fc75a5ced2345fc75a5ced2361606900316.png',
                'status' => 1,
                'created_at' => '2020-12-02 09:11:56',
                'updated_at' => '2020-12-02 09:11:56',
            ),
            2 => 
            array (
                'id' => 4,
                'title_en' => 'Career Consultation',
                'title_fr' => NULL,
                'slug' => NULL,
                'description_en' => '<p>Free Career Consultation for last semester student via online.</p>

<p>Link:&nbsp;http://scieducationusa.abgroup</p>

<p>TIme: 10 AM</p>',
                'description_fr' => NULL,
                'image' => '5fc75aef7ade95fc75aef7adeb1606900463.png',
                'status' => 1,
                'created_at' => '2020-12-02 09:14:23',
                'updated_at' => '2020-12-02 09:14:23',
            ),
            3 => 
            array (
                'id' => 5,
                'title_en' => 'Streaming Lecture and Collecting Donation for Charity',
                'title_fr' => NULL,
                'slug' => NULL,
                'description_en' => '<p>We will be Streaming Lecture from our Top-Class Professor and all the donation will be given to Charity.</p>

<p>&nbsp;</p>

<p>Streaming Link: http://scieducationusa.abgroup</p>',
                'description_fr' => NULL,
                'image' => '5fc75b6ec05425fc75b6ec05461606900590.png',
                'status' => 1,
                'created_at' => '2020-12-02 09:16:30',
                'updated_at' => '2020-12-02 09:16:30',
            ),
            4 => 
            array (
                'id' => 7,
                'title_en' => 'Covocation 2020',
                'title_fr' => NULL,
                'slug' => NULL,
                'description_en' => '<p>Covocation programme is about to be conducted in our university premises for the year of 2020.</p>

<p>This programme is for those who will be graduating this year and those students who are studying are invited to attend the program.</p>

<p>&nbsp;</p>

<p>Date: 31st December</p>

<p>Time: 11 AM onwards</p>

<p>Venue: University Premises</p>',
                'description_fr' => NULL,
                'image' => '5fcf30b43eb745fcf30b43eb751607413940.png',
                'status' => 1,
                'created_at' => '2020-12-03 10:25:35',
                'updated_at' => '2020-12-08 07:52:20',
            ),
            5 => 
            array (
                'id' => 8,
                'title_en' => 'Site Survey Programme',
                'title_fr' => NULL,
                'slug' => NULL,
                'description_en' => '<p>This programme is for the students of Civil Engineering and Construction Management.</p>

<p>This is 1 day event where students will be visiting a local site and will be surveying for the geographical reasoning, soil testing and all.</p>

<p>&nbsp;</p>

<p>Date : 15th December</p>

<p>Venue: Chobhar Height</p>

<p>Time: 11 PM Onwards</p>',
                'description_fr' => NULL,
                'image' => '5fcf30a8bb4be5fcf30a8bb4bf1607413928.png',
                'status' => 1,
                'created_at' => '2020-12-03 10:52:19',
                'updated_at' => '2020-12-08 07:52:08',
            ),
        ));
        
        
    }
}
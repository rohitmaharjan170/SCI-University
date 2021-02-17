<?php

use Illuminate\Database\Seeder;

class DeanMessagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('dean_messages')->delete();
        
        \DB::table('dean_messages')->insert(array (
            0 => 
            array (
                'id' => 1,
            'name' => 'Raghu Savalgi - MD, PhD, MBA, APC (IT), LRCP, MRCS, FRCS',
            'post' => 'Hunterian Professor, Royal College of Surgeons, London (UK), Former Faculty, University of London (UK) and Yale University School of Medicine (USA), President SCI Education USA- University',
            'description_en' => '<p>The Society for Creative Innovations (SCI) is a federally registered legitimate&nbsp;organization in the United States of America dedicated for strategic training and curricula development. It is a private organization and believes that non-linear intelligence, applied creativity, entrepreneurship, practical aspects of business related&nbsp;sciences are the pillars of rapid self &amp; social development, Therefore SCI Education (USA) develops curricula&nbsp;which impart such training&nbsp;on the platform of professional subjects like Business Management Sciences , Finance, Marketing &amp;&nbsp;MBA at affordable costs.&nbsp;Life transformational training is the goal and not just bookish knowledge. Moreover, SCI Education USA has started the process of becoming a Private University in the United States of America.</p>',
            'description_fr' => '<p>The Society for Creative Innovations (SCI) is a federally registered legitimate&nbsp;organization in the United States of America dedicated for strategic training and curricula development. It is a private organization and believes that non-linear intelligence, applied creativity, entrepreneurship, practical aspects of business related&nbsp;sciences are the pillars of rapid self &amp; social development, Therefore SCI Education (USA) develops curricula&nbsp;which impart such training&nbsp;on the platform of professional subjects like Business Management Sciences , Finance, Marketing &amp;&nbsp;MBA at affordable costs.&nbsp;Life transformational training is the goal and not just bookish knowledge. Moreover, SCI Education USA has started the process of becoming a Private University in the United States of America.</p>',
                'image' => '5ff40375730055ff40375730061609827189.png',
                'status' => 1,
                'created_at' => '2021-01-05 06:13:09',
                'updated_at' => '2021-01-05 06:13:09',
            ),
        ));
        
        
    }
}
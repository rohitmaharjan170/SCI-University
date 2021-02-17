<?php

use Illuminate\Database\Seeder;

class SiteSettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('site_settings')->delete();
        
        \DB::table('site_settings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'welcome_message_en' => NULL,
                'welcome_message_fr' => NULL,
                'contact_address' => 'COntact ADDRESS',
                'contact_hotline' => NULL,
                'contact_mobile' => NULL,
                'contact_company' => 'COnatact Company',
                'contact_jobseeker' => NULL,
                'contact_url' => 'https://www.google.com',
                'facebook' => 'https://www.fb.com',
                'instagram' => 'https://www.instagram.comm',
                'linkedin' => 'https://www.linked.in',
                'twitter' => 'https://www.twitter.com',
                'pinterest' => NULL,
                'latitude' => '5555',
                'longitude' => '1221',
                'website_name' => 'SCI EDUCATION',
                'primary_email' => 'primaryemail@email.com',
                'primary_address' => 'www.primary address',
                'primary_mobile' => '98888451525',
                'created_at' => '2020-11-30 07:48:46',
                'updated_at' => '2020-12-20 10:15:03',
            ),
        ));
        
        
    }
}
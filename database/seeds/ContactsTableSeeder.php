<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contacts')->delete();
        
        \DB::table('contacts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Rohit',
                'email' => 'rmaharjan61@gmail.com',
                'subject' => 'contact us Test',
                'message' => 'TEST MESSAGE',
                'created_at' => '2021-01-05 06:41:41',
                'updated_at' => '2021-01-05 06:41:41',
            ),
        ));
        
        
    }
}
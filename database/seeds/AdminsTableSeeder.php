<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'SCI Admin',
                'email' => 'sci@gmail.com',
                'password' => '$2y$12$JVgC8V4JJQ8kdBCwT3iLNelSc.CL5vrgHDpNNKrutsuLmY5utM5cC',
                'is_super' => 1,
                'verified' => 1,
                'status' => 1,
                'verify_token' => NULL,
                'remember_token' => 'KmdnHdYKc3EvQOqcd4w1XoZsPu17qYAn3GiXok4Du3TEML97yZ9Ve6VHQzrh',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}
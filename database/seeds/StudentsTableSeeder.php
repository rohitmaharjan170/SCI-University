<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('students')->delete();
        
        \DB::table('students')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'rohit new',
                'email' => 'rmaharjan1700@gmail.com',
                'password' => '$2y$10$rrNO1PzFwQB89uAShQ1EsO3j1oTejrudouaJ7T5vsFQKw7eqET7ra',
                'verified' => 1,
                'verify_token' => 'imlRm1TEweBiMb1cApNttotxFOnk7zoBGlXU1JMO',
                'remember_token' => 'qXW3NrWPyO8lHNjbxtwMd8k8rDGhHFb6yedCtp9i6zQp6BXEqa1moVffnOYy',
                'created_at' => '2021-01-05 07:27:05',
                'updated_at' => '2021-01-05 07:27:05',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'saujanya',
                'email' => 'gsaujanya@gmail.com',
                'password' => '$2y$10$uA7ec1pHhZdV.yb2ItFyE.FBuwQQF/vI/7pWcGHb7gPc3FLiOINzS',
                'verified' => 1,
                'verify_token' => 'eFmOxJpEcBdlUw2Dm4nqcTF3RcTX33wPO4YPtE42',
                'remember_token' => 'lYkiC1jI7nYgXUx00MguIkhgumfVBuJ0chU9v7jGa5JRvJ5qiwVZwU8055N7',
                'created_at' => '2021-01-05 07:27:33',
                'updated_at' => '2021-01-05 07:27:33',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Arun Kumar Gupta',
                'email' => 'siversansar@gmail.com',
                'password' => '$2y$10$gYVTB0hYRdLoWF.X1EZ8xO3aeZKmZj0jJ8UJSqoB05f8IQN09qrh2',
                'verified' => 0,
                'verify_token' => 'dEDVMjMk8u5uypYgxl0sUawBnQtZwzs8ll8fCssM',
                'remember_token' => NULL,
                'created_at' => '2021-01-05 12:43:45',
                'updated_at' => '2021-01-05 12:43:45',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'fads',
                'email' => 'samuel.mhrjn@gmail.com',
                'password' => '$2y$10$k.IeCQTcu7d03ECdyeDA4O4P79MLT6eN3nTBPj/mbVoM7qsCnOBVC',
                'verified' => 0,
                'verify_token' => 'VELWv5IJw02o9zbuBD0oiyPLjn4y2MRtv6yPPpvA',
                'remember_token' => NULL,
                'created_at' => '2021-01-05 12:51:25',
                'updated_at' => '2021-01-05 12:51:25',
            ),
        ));
        
        
    }
}
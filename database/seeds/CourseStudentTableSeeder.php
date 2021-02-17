<?php

use Illuminate\Database\Seeder;

class CourseStudentTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('course_student')->delete();
        
        
        
    }
}
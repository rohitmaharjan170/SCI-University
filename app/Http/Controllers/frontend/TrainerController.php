<?php

namespace App\Http\Controllers\frontend;

use App\models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainerController extends Controller
{
    public function index()
    {
        $data['title'] = 'Trainer Dashboard';
        $data['totalCourse'] = auth('trainer')->user()->courses->count();
        $data['totalAssignment'] = auth('trainer')->user()->assignments->count();

        return view('frontend.trainer.dashboard', $data);
    }

    public function courseList()
    {

        $data['title'] = 'Course List';
        $trainer = auth('trainer')->user();
        $courses = $trainer->courses;

        $data['courses'] = $courses->groupBy('program_id');

        return view('frontend.trainer.course.index', $data);
    }

    public function verifyEmailPage()
    {
        return view('frontend.verify-email');
    }
}

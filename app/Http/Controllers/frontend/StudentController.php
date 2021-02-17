<?php

namespace App\Http\Controllers\frontend;

use App\models\Course;
use App\models\Program;
use App\models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    public function index()
    {
        $data['title'] = 'Student Dashboard';
        $data['totalCourse'] = auth('student')->user()->courses->count();
        return view('frontend.student.dashboard', $data);
    }

    public function verifyEmailPage()
    {
        return view('frontend.verify-email');
    }

    public function programList()
    {
        $data['title'] = 'Programs';
        $data['programs'] = Program::select('id', 'title_en')->latest()->paginate(20);

        return view('frontend.student.program.index', $data);
    }

    public function courseList()
    {
        $data['title'] = 'Course Enrolled';

        $student = auth('student')->user();
        $programCourse = $student->courses;
        $data['courses'] = $programCourse->groupBy('program_id');

        return view('frontend.student.course.index', $data);
    }
}

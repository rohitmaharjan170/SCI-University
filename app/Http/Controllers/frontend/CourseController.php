<?php

namespace App\Http\Controllers\frontend;

use App\models\Course;
use App\models\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{

    public function index(Request $request)
    {
        $data['title'] = 'Programs';
        $data['lang'] = $request->cookie('lang');
        $data['courses'] = Course::latest()->paginate(20);

        return view('frontend.course.index', $data);
    }

    public function show($course)
    {
        $data['course'] = Course::with('trainer')->where('slug', $course)->first();
        $data['recentCourse'] = Course::latest()->limit(10)->get();
        $data['totalEnrolledStudents'] = $data['course']->students->count();
        return view('frontend.course.view', $data);
    }

    public function courseActions($id)
    {
        $cid = $id;
        $userType = auth('student')->check();
        $data['title'] = 'Course Actions';
        //check if its student login
        if ($userType) {
            $data['courseId'] = $cid;

            return view('frontend.student.course.actions', $data);
        } //for trainer
        else {
            $data['courseId'] = $cid;

            return view('frontend.trainer.course.actions', $data);
        }

        customErrorMessage('something went wrong!', 'Error');

        return back();
    }


}

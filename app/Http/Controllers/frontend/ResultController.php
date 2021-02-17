<?php

namespace App\Http\Controllers\frontend;

use App\models\Exam;
use App\models\ExamResult;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResultController extends Controller
{
    public function index()
    {
        $data['exam'] = 'View Test Results';
        $student = auth('student')->user();
        $data['results'] = ExamResult::with('exam')->where('student_id', $student->id)->latest()->paginate(20);
        return view('frontend.student.test.exam-result', $data);
    }

    public function testResult(Request $request)
    {
        $resultId = decrypt($request->result_id);
        $data['result'] = ExamResult::with('student')->with('exam')->with('studentOptions')->find($resultId);

        return view('frontend.student.test.result', $data);
    }

    public function testTimeStore(Request $request)
    {
        session()->put('timeRemaining', $request->remaining_time);
    }
}

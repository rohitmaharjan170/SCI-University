<?php

namespace App\Http\Controllers\backend;

use App\models\ExamResult;
use App\models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use mysql_xdevapi\Result;
use PDF;

class ResultsController extends Controller
{
    public function index()
    {
        $data['title'] = 'Student Result';
        return view('backend.admin.result.index', $data);
    }

    public function searchStudent(Request $request)
    {
        $data['title'] = 'Search Results';
        $searchParam = $request->search_param;
        $data['student'] = Student::select('id', 'name', 'email')->where('name', 'like', '%' . $searchParam . '%')->orWhere('email', 'like', '%' . $searchParam . '%')->get();

        return view('backend.admin.result.index', $data);
    }

    public function studentResult($studentId)
    {
        $data['title'] = 'Search Results';
        $data['results'] = ExamResult::with('exam')->where('student_id', $studentId)->latest()->paginate(30);
        return view('backend.admin.result.student-result', $data);
    }

    public function showAnswer($resultId)
    {
        $data['title'] = 'Student Answers';
        $data['result'] = ExamResult::with('student')->with('exam')->with('studentOptions')->find($resultId);

        return view('backend.admin.result.show-answer', $data);
    }

    public function downloadResult($resultId)
    {
        $data['result'] = ExamResult::with('student')->with('exam')->with('studentOptions')->find($resultId);
        $fileName = $data['result']->student->name.' result' ?? 'result';
        $pdf = PDF::loadView('backend.admin.result.download', $data)->setPaper('a4');
        return $pdf->download($fileName.'.pdf');

//        return view('backend.admin.result.download',$data);
    }
}

<?php

namespace App\Http\Controllers\frontend;

use App\models\Course;
use App\models\Exam;
use App\models\ExamResult;
use App\models\Program;
use App\models\Question;
use App\models\Student;
use App\models\StudentAnswer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TestsController extends Controller
{
    public function index()
    {
        $data['exam'] = 'Take Test';
        $data['exam'] = Exam::latest()->pluck('exam_title_en', 'id');

        return view('frontend.student.test.index', $data);
    }

    public function startTest(Request $request)
    {
        //check if user has already given exam before
        $examGiven = checkExamSubmission(auth('student')->user()->id, $request->exam_id);
        if ($examGiven) {
            customErrorMessage('you have already submitted the exam!', 'Error');
            return back();
        }

        $exam = Exam::with('course')->find($request->exam_id);
        $data['exam'] = $exam;
        $totalTime = $exam->time_duration;
        $currentTime = Carbon::now();
        $examStartTime = new Carbon($exam->exam_date);
        $endTime = $examStartTime->addMinute($totalTime)->toDateTimeString();

        if ($currentTime < $exam->exam_date) {
            customErrorMessage('Exam has not started yet!', 'Error');
            return back()->withInput();
        }

        if ($currentTime > $endTime) {
            customErrorMessage('exam time is over', 'Exam Finished');
            return redirect('/student/test');
        }

        $data['endTime'] = $endTime;
        $student = auth('student')->user();
        $data['student'] = $student;
        $courseId = $exam->course->id;
        $studentCourse = DB::table('course_student')->where('student_id', $student->id)->where('course_id', $courseId)->first();

        if (empty($studentCourse)) {
            customErrorMessage('You have not enrolled this course', 'Error');
            return back()->withInput();
        }

        $data['questions'] = Question::where('exam_id', $exam->id)->where('status', 1)->with('options')->inRandomOrder()->get();

        $data['totalQuestions'] = count($data['questions']);

        return view('frontend.student.test.start-test', $data);
    }

    public function store(Request $request)
    {
        //check if user has already given exam before
        $examGiven = checkExamSubmission(auth('student')->user()->id, $request->exam_id);
        if ($examGiven) {
            customErrorMessage('you have already submitted the exam!', 'Error');
            return redirect('/student/test');
        }
        $examId = $request->exam_id;

        $studentAnswerSubmission = $request->student_answer;
        $student = auth('student')->user();
        $studentCorrectAnswers = 0;
        $totalMarksObtained = 0;
        foreach ($studentAnswerSubmission as $answerValue) {
            $questionId = $answerValue['question_id'] ?? null;
            $answerVal = $answerValue['option_id'] ?? null;
            $question = Question::with('options')->find($questionId);
            foreach ($question->options as $option) {
                if ($answerVal == $option->id && $option->correct) {
                    $studentCorrectAnswers++;
                    $totalMarksObtained += $question->marks_value;
                }
            }

        }
        //save the student result
        $result = new ExamResult;
        $result->student_id = $student->id;
        $result->exam_id = $examId;
        $result->correct_answers = $studentCorrectAnswers;
        $result->questions_count = $request->total_questions;
        $result->total_marks_obtained = $totalMarksObtained;
        $result->save();

        //save student answer for this exam
        foreach ($studentAnswerSubmission as $questionAnswer) {
            $studentAnswer = new StudentAnswer;
            $studentAnswer->student_id = $student->id;
            $studentAnswer->exam_id = $examId;
            $studentAnswer->exam_result_id = $result->id;
            $studentAnswer->question_id = $questionAnswer['question_id'];
            $studentAnswer->option_id = $questionAnswer['option_id'] ?? null;
            $studentAnswer->save();
        }

        //remove session endTime
        session()->forget('endTime_' . $examId);

        customSuccessMessage('Exam has been submitted successfully', 'Exam Finished');
        return redirect()->route('student.test.result', ['result_id' => encrypt($result->id)]);
    }

    //for generating exam details using ajax
    public function examDetails(Request $request)
    {
        $examDetails = Exam::select('exam_title_en', 'exam_description_en', 'total_marks', 'time_duration')->find($request->exam_id);

        return $examDetails;
    }
}

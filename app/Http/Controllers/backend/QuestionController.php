<?php

namespace App\Http\Controllers\backend;

use App\models\Course;
use App\models\Exam;
use App\models\Option;
use App\models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authorize = checkPermissionToAccess('question-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Question';

        $data['questions'] = Question::latest()->paginate(25);
        return view('backend.admin.question.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorize = checkPermissionToAccess('question-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }
        $data['exam'] = Exam::select('id', 'exam_title_en')->pluck('exam_title_en', 'id');
        return view('backend.admin.question.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $authorize = checkPermissionToAccess('question-create');
            if (!$authorize) {
                customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
                return back();
            }

            $question = new Question;
            $question->exam_id = $request->exam_id;
            $question->question_title_en = $request->question_title_en;
            $question->question_title_fr = $request->question_title_fr;
            $question->question_description_en = $request->question_description_en;
            $question->question_description_fr = $request->question_description_fr;
            $question->question_type = $request->question_type;
            $question->marks_value = $request->marks_value;
            $question->status = $request->status;
            $question->save();
            //save options for that question
            $correctOption = $request->correct;
            foreach ($request->options as $key => $option) {
                $correct = ($key + 1) == $correctOption ? 1 : 0;
                $question->options()->create([
                    'question_id' => $question->id,
                    'option' => $option,
                    'correct' => $correct
                ]);
            }

            CreateMessage('Question');
            return redirect('admin/question');

        } catch (\Exception $e) {
            customErrorMessage($e->getMessage(), 'Failed');
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $authorize = checkPermissionToAccess('question-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['question'] = Question::findOrFail($id);
        return view('backend.admin.question.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authorize = checkPermissionToAccess('question-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['question'] = Question::with('options')->findOrFail($id);

        foreach ($data['question']->options as $key => $opt) {
            $count = $key + 1;
            $option[$opt->id] = 'Option ' . $count;
        }
        $options = collect($option);

        $data['options'] = $options;
        return view('backend.admin.question.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $authorize = checkPermissionToAccess('question-edit');
            if (!$authorize) {
                customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
                return back();
            }

            $question = Question::findOrFail($id);
            $question->question_title_en = $request->question_title_en;
            $question->question_title_fr = $request->question_title_fr;
            $question->question_description_en = $request->question_description_en;
            $question->question_description_fr = $request->question_description_fr;
            $question->question_type = $request->question_type;
            $question->marks_value = $request->marks_value;
            $question->status = $request->status;
            $question->update();

            //update options
            if ($request->option) {

                foreach ($request->option as $optId => $optionValue) {
                    //update correct option
                    // remove the old correct option and update the correct option
                    if ($request->correct) {
                        $option = Option::where('id', $optId)->first();
                        if ($optId == $request->correct) {
                            $option->update(['correct' => 1]);
                        }
                        if ($optId != $request->correct && $option->correct) {
                            $option->update(['correct' => 0]);
                        }
                    }
                    //update option values
                    Option::where('id', $optId)->update(['option' => $optionValue]);
                }
            }

            UpdateMessage('Question');
            return back();

        } catch (\Exception $e) {
            customErrorMessage($e->getMessage(), 'Failed');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authorize = checkPermissionToAccess('question-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $question = Question::findOrFail($id);
        $question->delete();

        DeleteMessage('Question');
        return back();
    }

    public function search(Request $request)
    {
        $data['questions'] = Question::where('question_title_en', 'like', '%' . $request->question . '%')->paginate(25);
        return view('backend.admin.question.index', $data);
    }
}

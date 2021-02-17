<?php

namespace App\Http\Controllers\backend;

use App\models\Course;
use App\models\Exam;
use App\models\Program;
use App\models\Training;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authorize = checkPermissionToAccess('exam-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Exam';
        $data['exam'] = Exam::with('course')->with('training')->latest()->paginate(20);

        return view('backend.admin.exam.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorize = checkPermissionToAccess('exam-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['course'] = Course::select('id', 'title_en')->get()->pluck('title_en', 'id');
        $data['training'] = Training::select('id', 'title_en')->get()->pluck('title_en', 'id');
        return view('backend.admin.exam.create', $data);
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
            $authorize = checkPermissionToAccess('exam-create');
            if (!$authorize) {
                customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
                return back();
            }

            Exam::create($request->all());

            CreateMessage('Exam');
            return redirect('admin/exam');
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
        $data['title'] = 'Exam';
        $data['exam'] = Exam::with('course')->find($id);
        return view('backend.admin.exam.view',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authorize = checkPermissionToAccess('exam-edit');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['exam'] = Exam::findOrFail($id);
        $data['course'] = Course::select('id', 'title_en')->get()->pluck('title_en', 'id');
        $data['training'] = Training::select('id', 'title_en')->get()->pluck('title_en', 'id');

        return view('backend.admin.exam.edit', $data);
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
            $authorize = checkPermissionToAccess('exam-edit');
            if (!$authorize) {
                customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
                return back();
            }

            $exam = Exam::findOrFail($id);
            $exam->update($request->all());

            UpdateMessage('Exam');
            return back();
        } catch (\Exception $e) {
            customErrorMessage('Failed to update exam!', 'Failed');
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
        $authorize = checkPermissionToAccess('exam-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $exam = Exam::findOrFail($id);
        $exam->delete();
        DeleteMessage('Exam');
        return back();
    }
}

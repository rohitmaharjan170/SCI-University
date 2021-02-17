<?php

namespace App\Http\Controllers\backend;

use App\models\Admission;
use App\models\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdmissionController extends Controller
{
    public function index()
    {
        $authorize = checkPermissionToAccess('admission-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Admission';
        $data['admission'] = Admission::latest()->paginate(12);
        return view('backend.admin.admission.index', $data);
    }

    public function create()
    {
        $authorize = checkPermissionToAccess('admission-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Programs';
        $data['programs'] = Program::select('id','title_en')->pluck('title_en','id');

        return view('backend.admin.admission.create', $data);
    }

    public function store(Request $request)
    {
        $authorize = checkPermissionToAccess('admission-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'program_id' => 'required',
            'email' => 'required|email|max:255',
            'resume' => 'mimes:jpeg,png,bmp,pdf,docx,doc|max:20480'
        ]);
        try {
            $admission = new Admission;

            //upload bod image
            if ($request->resume) {
                $admission->resume = uploadSingleDoc($request->resume, 'admission');
            }

            $admission->first_name = $request->first_name;
            $admission->last_name = $request->last_name;
            $admission->country = $request->country;
            $admission->city = $request->city;
            $admission->phone = $request->phone;
            $admission->email = $request->email;
            $admission->specialisation = $request->specialisation;
            $admission->how_did_you_hear_us = $request->how_did_you_hear_us;
            $admission->status = $request->status;

            $admission->save();

            CreateMessage('Admission');

            return redirect('/admin/admission');
        } catch (\Exception $e) {
            customErrorMessage('Failed to Create Admission!', 'Failed');
            return back()->withInput($request->all());
        }
    }

    public function show($id)
    {
        $authorize = checkPermissionToAccess('admission-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['admission'] = Admission::findOrFail($id);
        return view('backend.admin.admission.view', $data);
    }

    public function destroy($id)
    {
        $authorize = checkPermissionToAccess('admission-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $admission = Admission::findOrFail($id);
        //delete the doc
        removeSingleOldDoc($admission->resume, 'admission');
        $admission->delete();
        DeleteMessage('Admission');
        return back();
    }

}

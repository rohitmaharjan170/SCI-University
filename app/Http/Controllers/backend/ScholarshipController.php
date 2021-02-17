<?php

namespace App\Http\Controllers\backend;

use App\models\Program;
use App\models\Scholarship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ScholarshipController extends Controller
{
    public function index()
    {
        $authorize = checkPermissionToAccess('scholarship-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['title'] = 'Scholarship';
        $data['scholarship'] = Scholarship::latest()->paginate(12);
        return view('backend.admin.scholarship.index', $data);
    }

    public function create()
    {
        $authorize = checkPermissionToAccess('scholarship-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }
        $data['programs'] = Program::select('title_en', 'id')->pluck('title_en', 'id');
        return view('backend.admin.scholarship.create',$data);
    }

    public function store(Request $request)
    {
        $authorize = checkPermissionToAccess('scholarship-create');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|max:255',
            'resume' => 'mimes:jpeg,png,bmp,pdf,docx,doc|max:20480'
        ]);
        try {
            $scholarship = new Scholarship;

            //upload bod image
            if ($request->resume) {
                $scholarship->resume = uploadSingleDoc($request->resume, 'scholarship');
            }

            $scholarship->first_name = $request->first_name;
            $scholarship->last_name = $request->last_name;
            $scholarship->country = $request->country;
            $scholarship->city = $request->city;
            $scholarship->phone = $request->phone;
            $scholarship->email = $request->email;
            $scholarship->program_id= $request->program;
            $scholarship->specialisation = $request->specialisation;
            $scholarship->facebook = $request->facebook;
            $scholarship->instagram = $request->instagram;
            $scholarship->twitter = $request->twitter;
            $scholarship->linkedin = $request->linkedin;
            $scholarship->how_did_you_hear_us = $request->how_did_you_hear_us;
            $scholarship->status = $request->status;

            $scholarship->save();

            CreateMessage('Scholarship');

            return redirect('/admin/scholarship');
        } catch (\Exception $e) {
            customErrorMessage('Failed to Create Scholarship!', 'Failed');
            return back()->withInput($request->all());
        }
    }

    public function show($id)
    {
        $authorize = checkPermissionToAccess('scholarship-list');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $data['scholarship'] = Scholarship::findOrFail($id);
        return view('backend.admin.scholarship.view', $data);
    }

    public function destroy($id)
    {
        $authorize = checkPermissionToAccess('scholarship-delete');
        if (!$authorize) {
            customErrorMessage('You dont have permission to perform this action!', 'Access Blocked');
            return back();
        }

        $scholarship = Scholarship::findOrFail($id);
        //delete the doc
        removeSingleOldDoc($scholarship->resume, 'scholarship');
        $scholarship->delete();
        DeleteMessage('Scholarship');
        return back();
    }

}

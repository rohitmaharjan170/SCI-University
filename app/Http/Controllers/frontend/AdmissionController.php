<?php

namespace App\Http\Controllers\frontend;

use App\Mail\AdmissionApplicationMail;
use App\models\Admission;
use App\models\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AdmissionController extends Controller
{
    public function index()
    {
        $data['title'] = 'Admission';
        $data['programs'] = Program::select('id', 'title_en')->where('status', 1)->pluck('title_en', 'id');
        return view('frontend.admission.index', $data);
    }

    public function admissionApply(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|max:255',
            'program_id' => 'required',
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
            $admission->program_id = $request->program_id;
            $admission->how_did_you_hear_us = $request->how_did_you_hear_us;
            $admission->status = $request->status;

            $admission->save();
            Mail::to($admission->email)->send(new AdmissionApplicationMail($admission));
            customSuccessMessage('Admission Application Received!', 'Success');

            return back();
        } catch (\Exception $e) {
            customErrorMessage($e, 'Failed');
            return back()->withInput($request->all());
        }
    }
}

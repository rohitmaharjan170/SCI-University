<?php

namespace App\Http\Controllers\frontend;

use App\Mail\ScholarshipApplicationMail;
use App\models\Scholarship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ScholarshipController extends Controller
{
    public function applyScholarship(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|max:255',
            'resume' => 'mimes:jpeg,png,bmp,pdf,docx,doc|max:20480'
        ]);
        try {
            DB::beginTransaction();
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
            $scholarship->gender = $request->gender;
            $scholarship->language = $request->language;
            $scholarship->email = $request->email;
            $scholarship->program_id = $request->program;
            $scholarship->facebook = $request->facebook;
            $scholarship->instagram = $request->instagram;
            $scholarship->twitter = $request->twitter;
            $scholarship->linkedin = $request->linkedin;
            $scholarship->how_did_you_hear_us = $request->how_did_you_hear_us;
            $scholarship->status = $request->status;

            $scholarship->save();
//            Mail::to($scholarship->email)->send(new ScholarshipApplicationMail($scholarship));
            DB::commit();
            customSuccessMessage('You Scholarship Application has been received!', 'Success');

            return back();
        } catch (\Exception $e) {
            customErrorMessage($e->getMessage(), 'Failed');
            DB::rollback();
            return back()->withInput($request->all());
        }
    }
}

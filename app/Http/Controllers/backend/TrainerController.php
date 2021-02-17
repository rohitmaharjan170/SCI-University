<?php

namespace App\Http\Controllers\backend;

use App\Mail\TrainerPasswordUpdateMail;
use App\Mail\TrainerRegisteredMail;
use App\models\Course;
use App\models\Trainer;
use App\models\Training;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class TrainerController extends Controller
{
    public function index()
    {
        $data['title'] = 'Trainer';
        $data['trainer'] = Trainer::latest()->paginate(12);
        return view('backend.admin.trainer.index', $data);
    }

    public function create()
    {
        $data['title'] = 'Create Trainer';
        return view('backend.admin.trainer.create', $data);
    }

    public function show($id)
    {
        $data['trainer'] = Trainer::findOrFail($id);

        return view('backend.admin.trainer.view', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:trainers|max:255',
            'password' => 'required|confirmed|max:255'
        ]);

        try {
            $trainer = new Trainer;
            $trainer->first_name = $request->first_name;
            $trainer->last_name = $request->last_name;
            $trainer->phone = $request->phone;
            $trainer->email = $request->email;
            $trainer->password = bcrypt($request->password);
            $trainer->status = $request->status;
            $trainer->verify_token = uniqid() . uniqid();

            $trainer->save();
            Mail::to($trainer->email)->send(new TrainerRegisteredMail($trainer));
            CreateMessage('Trainer');

            return redirect('/admin/trainer');
        } catch (\Exception $e) {
            customErrorMessage('Failed to Create Trainer!', 'Failed');
            return back()->withInput($request->all());
        }
    }

    public function edit($id)
    {
        $data['trainer'] = Trainer::findOrFail($id);
        return view('backend.admin.trainer.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'confirmed|max:255'
        ]);

        try {
            $trainer = Trainer::findOrFail($id);
            $trainer->first_name = $request->first_name;
            $trainer->last_name = $request->last_name;
            $trainer->phone = $request->phone;
            $trainer->email = $request->email;
            if ($request->password) {
                $trainer->password = bcrypt($request->password);
            }
            $trainer->status = $request->status;
            $trainer->update();

            Mail::to($trainer->email)->send(new TrainerPasswordUpdateMail($trainer, $request->password));

            UpdateMessage('Trainer');

            return redirect('/admin/trainer');
        } catch (\Exception $e) {
            FailedMessage('Trainer');
            return back()->withInput($request->all());
        }
    }

    public function destroy($id)
    {
        $trainer = Trainer::findOrFail($id);
        $trainer->delete();
        DeleteMessage('Trainer');
        return back();
    }

    public function verifyEmailForm(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'verify_token' => 'required'
        ]);

        $data['email'] = $request->email;
        $data['verify_token'] = $request->verify_token;
        return view('backend.admin.trainer.verify-email', $data);
    }

    public function verifyEmailConfirm(Request $request)
    {
        $request->validate([
            'verify_token' => 'required',
            'email' => 'required|email|max:255',
            'password' => 'confirmed|max:255'
        ]);

        $email = $request->email;
        $verifytoken = $request->verify_token;
        $password = $request->password;

        $trainer = Trainer::where('email', $email)->where('verify_token', $verifytoken)->first();
        if ($trainer) {
            $trainer->update([
                'password' => bcrypt($password),
                'verify_token' => null,
                'email_verified' => true
            ]);

            customSuccessMessage('Trainer Account verified successfully!', 'Success');
            return redirect('/login');
        }
        customErrorMessage('Failed to verify Trainer!', 'Error');
        return redirect('/login');

    }
}

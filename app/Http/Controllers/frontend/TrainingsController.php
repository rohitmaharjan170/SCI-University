<?php

namespace App\Http\Controllers\frontend;

use App\models\Training;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainingsController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'Trainings';
        $data['lang'] = $request->cookie('lang');
        $data['trainings'] = Training::latest()->paginate(20);

        return view('frontend.training.index', $data);
    }

    public function show(Training $training)
    {
        $data['title'] = 'Training';
        $data['lang'] = lang() === 'fr' ? 'fr' : 'en';
        $data['training'] = $training;
        $data['totalEnrolledStudents'] = $training->students()->count();
        $data['recentTraining'] = Training::latest()->limit(10)->get();

        return view('frontend.training.view', $data);
    }
}

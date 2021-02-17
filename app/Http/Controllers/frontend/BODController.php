<?php

namespace App\Http\Controllers\frontend;

use App\models\BoardOfDirector;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BODController extends Controller
{
    public function index()
    {
        $data['title'] = 'Board Of Directors';
        $data['bod'] = BoardOfDirector::where('faculty', 'bod')->latest()->get();
        return view('frontend.bod.index', $data);
    }

    public function resident()
    {
        $data['title'] = 'Board Of Directors';
        $data['bod'] = BoardOfDirector::where('faculty', 'resident')->latest()->get();
        return view('frontend.residentprofessor.index', $data);
    }
    public function visiting()
    {
        $data['title'] = 'Board Of Directors';
        $data['bod'] = BoardOfDirector::where('faculty', 'visiting')->latest()->get();
        return view('frontend.visitingprofessor.index', $data);
    }
    public function consultant()
    {
        $data['title'] = 'Board Of Directors';
        $data['bod'] = BoardOfDirector::where('faculty', 'consultant')->latest()->get();
        return view('frontend.consultant.index', $data);
    }
    public function instructor()
    {
        $data['title'] = 'Board Of Directors';
        $data['bod'] = BoardOfDirector::where('faculty', 'instructor')->latest()->get();
        return view('frontend.instructor.index', $data);
    }
}

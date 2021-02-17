<?php

namespace App\Http\Controllers\frontend;

use App\models\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramsController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = 'Programs';
        $data['lang'] = $request->cookie('lang');
        $data['programs'] = Program::latest()->paginate(20);

        return view('frontend.programs.index', $data);
    }

    public function show(Program $program)
    {
        $data['title'] = 'Programs';
        $data['lang'] = request()->cookie('lang');
        $data['program'] = $program;
        $data['recentPrograms'] = Program::latest()->limit(10)->get();

        return view('frontend.programs.view', $data);
    }
}

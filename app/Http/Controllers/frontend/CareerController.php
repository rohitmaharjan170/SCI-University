<?php

namespace App\Http\Controllers\frontend;

use App\models\Career;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CareerController extends Controller
{
    public function index()
    {
        $data['title'] = 'Career';
        $data['careers'] = Career::latest()->get();
        return view('frontend.career.index', $data);
    }

    //career notice for student
    public function careerNotice()
    {
        $data['title'] = 'Title';
        $data['career'] = Career::where('status',1)->latest()->paginate(20);
        return view('frontend.student.career.index', $data);
    }
}

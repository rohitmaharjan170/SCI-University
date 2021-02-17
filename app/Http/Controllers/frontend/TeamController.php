<?php

namespace App\Http\Controllers\frontend;

use App\models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index()
    {
        $data['title'] = 'Team';
        $data['teams'] = Team::latest()->get();
        return view('frontend.team.index', $data);
    }
}

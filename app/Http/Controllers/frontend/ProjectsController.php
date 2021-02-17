<?php

namespace App\Http\Controllers\frontend;

use App\models\CompanyAssociate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectsController extends Controller
{
    public function index()
    {
        $data['title'] = 'Projects';
        $data['lang'] = lang() === 'fr' ? 'fr' : 'en';
        $data['projects'] = CompanyAssociate::latest()->paginate(30);

        return view('frontend.project.index',$data);
    }

    public function show(CompanyAssociate $project)
    {
        $data['title'] = 'Projects';
        $data['project'] = $project;
        $data['lang'] = lang() === 'fr' ? 'fr' : 'en';
        $data['recentProjects'] = CompanyAssociate::latest()->limit(10)->get();
        return view('frontend.project.view', $data);
    }
}

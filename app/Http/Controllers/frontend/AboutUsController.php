<?php

namespace App\Http\Controllers\frontend;

use App\models\AboutUs;
use App\models\CMS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutUsController extends Controller
{
    public function index()
    {
        $data['title'] = 'About Us';
        $data['aboutUs'] = getCMS('about_us');

        return view('frontend.about-us.index', $data);
    }
    
}

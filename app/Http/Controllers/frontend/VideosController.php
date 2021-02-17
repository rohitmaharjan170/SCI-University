<?php

namespace App\Http\Controllers\frontend;

use App\models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideosController extends Controller
{
    public function index()
    {
        $data['title'] = 'Videos';
        $data['lang'] = request()->cookie('lang');
        $data['videos'] = Video::latest()->paginate(30);

        return view('frontend.video.index', $data);
    }
}

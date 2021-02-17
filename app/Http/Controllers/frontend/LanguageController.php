<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App;

class LanguageController extends Controller
{
    public function index($lang = null)
    {
        $cookie = cookie('lang', $lang ?? 'en', 5000);
        return redirect()->back()->cookie($cookie);
    }
}

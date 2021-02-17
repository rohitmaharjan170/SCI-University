<?php

namespace App\Http\Controllers\frontend;

use App\models\CMS;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FooterController extends Controller
{
    public function termsandconditions()
    {
        $data['content'] = getCMS('terms_and_conditions');
        return view('frontend.footer.index', $data);
    }

    public function privacyPolicy()
    {
        $data['content'] = getCMS('privacy_policy');
        return view('frontend.footer.index', $data);
    }

}

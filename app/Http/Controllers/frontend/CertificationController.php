<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificationController extends Controller
{
    public function index()
    {
        $data['title'] = 'Verify Certification';
        return view('frontend.verify-certification.index', $data);
    }
}

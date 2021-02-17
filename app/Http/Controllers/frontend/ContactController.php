<?php

namespace App\Http\Controllers\frontend;

use App\models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $data['title'] = 'Contact';
        return view('frontend.contact.index', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        Contact::create($request->only('name','email','subject','message'));

        customSuccessMessage('Thankyou for contacting us!','Success');
        return back();
    }
}

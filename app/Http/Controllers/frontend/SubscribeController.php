<?php

namespace App\Http\Controllers\frontend;


use App\Http\Controllers\Controller;
use App\models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|email',

        ]);

        $subscribe = new Subscribe();
        $subscribe->email = $request->email;
        $subscribe->save();
        //Session::flash('message', 'Category created successfully');
        $request->session()->flash('message', 'Subscribed successful!');
        return redirect('/');

    }
}

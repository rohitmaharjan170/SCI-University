<?php

namespace App\Http\Controllers\frontend;

use App\models\Press;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Press';
        $data['lang'] = request()->cookie('lang');
        $data['press'] = Press::latest()->paginate(20);

        return view('frontend.press.index', $data);
    }

    public function show(Press $press)
    {
        $data['title'] = 'Press';
        $data['press'] = $press;
        $data['recentPress'] = Press::latest()->limit(10)->get();

        return view('frontend.press.view', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
}

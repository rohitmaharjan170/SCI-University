<?php

namespace App\Http\Controllers\frontend;

use App\models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    public function index()
    {
        $data['title'] = 'Events';
        $data['events'] = Event::latest()->paginate(30);
        return view('frontend.event.index', $data);
    }

    public function show(Event $event)
    {
        $data['title'] = 'Events';
        $data['lang'] = lang() === 'fr' ? 'fr' : 'en';
        $data['event'] = $event;
        $data['recentEvents'] = Event::latest()->limit(7)->get();
        return view('frontend.event.view', $data);
    }
}

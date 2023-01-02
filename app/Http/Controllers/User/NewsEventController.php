<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\NewsEvent;

class NewsEventController extends Controller
{
    public function index()
    {
        $current_date = date('d-m-y h:i:s');
        $events = NewsEvent::where('event_date', '>=', $current_date)->get();
        return view('user.news.index', compact('events'));
    }

    public function show($slug)
    {
        $event = NewsEvent::where('slug', $slug)->first();
        return view('user.news.show', compact('event'));
    }
}

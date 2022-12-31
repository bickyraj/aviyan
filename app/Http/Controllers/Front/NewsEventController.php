<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\NewsEvent;
use Illuminate\Http\Request;

class NewsEventController extends Controller
{
    public function index()
    {
        $events = NewsEvent::orderBy('event_date', 'desc')->get();
        return view('front.news.index', compact('events'));
    }

    public function show($slug)
    {
        $event = NewsEvent::where('slug', '=', $slug)->first();
        $events = NewsEvent::limit(3)->latest()->get();
        return view('front.news.show', compact('event', 'events'));
    }
}

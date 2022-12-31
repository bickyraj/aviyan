<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gallery;

class GalleryController extends Controller
{
	public function index()
	{
		$galleries = Gallery::latest()->get();
		return view('front.galleries.index', compact('gallery'));
	}
}
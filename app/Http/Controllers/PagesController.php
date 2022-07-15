<?php

namespace App\Http\Controllers;

use App;

class PagesController extends Controller
{
    public function index(){
        return view('index');
    }

    public function about(){
        return view('about');
    }

    public function contacts()
    {
        $response = \GoogleMaps::load('geocoding')
		->setParam (['address' =>'Svratouch'])
 		->get();
        
        return view('contact', compact('response'));
    }
}

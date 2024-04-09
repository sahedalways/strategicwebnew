<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function aboutUs()
    {
        return view('frontend.about-us');
    }


    public function contactUs()
    {
        return view('frontend.contact-us');
    }


    public function services()
    {
        return view('frontend.services');
    }


    public function press()
    {
        return view('frontend.press');
    }
}

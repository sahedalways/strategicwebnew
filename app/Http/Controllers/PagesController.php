<?php

namespace App\Http\Controllers;

use App\Models\Article;
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
        // Retrieve all articles from the database
        $articles = Article::all();

        return view('frontend.press', ['articles' => $articles]);
    }


    public function pricing()
    {
        return view('frontend.pricing');
    }
}

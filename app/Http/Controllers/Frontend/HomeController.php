<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /* HOME PAGE */

    public function home()
    {

        return view('frontend.pages.home');

    }

    /* ABOUT PAGE */

    public function about()
    {

        return view('frontend.pages.about');

    }

    /* SERVICES PAGE */

    public function services()
    {

        return view('frontend.pages.services');

    }

    /* PORTFOLIO PAGE */

    public function portfolio()
    {

        return view('frontend.pages.portfolio');

    }

}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    //

    public function admin()
    {
        return view('front.admin');
    }

    public function customer()
    {
        return view('front.customer');
    }

    public function user()
    {
        return view('front.index');
    }

    public function whyus()
    {
        return view('front.whyus');
    }

    public function Disclaimer()
    {
        return view('front.Disclaimer');
    }

    public function Privacy()
    {
        return view('front.Privacy');
    }
    public function Condition()
    {
        return view('front.Condition');
    }

    public function admindashboard()
    {
        return view('front.admindashboard');
    }
}

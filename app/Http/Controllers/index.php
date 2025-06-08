<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class index extends Controller
{
    function index()
    {
        return view('index', ['pageTitle' => 'Home']);
    }
    function about()
    {
        return view('about', ['pageTitle' => 'About Us']);
    }
    function contact()
    {
        return view('contact', ['pageTitle' => 'Contact Us']);
    }
}

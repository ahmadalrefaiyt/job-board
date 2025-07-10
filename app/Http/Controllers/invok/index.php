<?php

namespace App\Http\Controllers\invok;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class index extends Controller
{
    public function __invoke(Request $request)
    {
        return view('index', ['pageTitle' => 'Home']);
    }
}

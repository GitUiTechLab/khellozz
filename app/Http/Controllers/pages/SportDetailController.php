<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SportDetailController extends Controller
{
    function SportDetail()
    {
        return view('pages.sport-detail');
    }
}

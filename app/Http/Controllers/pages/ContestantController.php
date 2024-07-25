<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContestantController extends Controller
{
    function Contestants()
    {
        return view('pages.contestants');
    }
}

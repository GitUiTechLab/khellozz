<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterTwoController extends Controller
{
    function RegisterTwo()
    {
        return view('pages.register2');
    }
}

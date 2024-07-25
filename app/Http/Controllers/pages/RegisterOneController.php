<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterOneController extends Controller
{
    function Register()
    {
        return view('pages.register1');
    }
}

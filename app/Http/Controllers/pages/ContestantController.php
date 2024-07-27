<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Models\AddContestant;
use Illuminate\Http\Request;
use Spatie\LaravelIgnition\FlareMiddleware\AddContext;

class ContestantController extends Controller
{
    function index()
    {
        $contestants = AddContestant::all();
        return view('pages.contestants',compact('contestants'));
    }
}

<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContestantDetailController extends Controller
{
    function ContestantDetail()
    {
        return view('pages.contestants-detail');
    }
}

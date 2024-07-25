<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlayerAchievementController extends Controller
{
    function PlayerAchievements()
    {
        return view('pages.player-achievements');
    }
}

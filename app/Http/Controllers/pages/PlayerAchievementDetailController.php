<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlayerAchievementDetailController extends Controller
{
    function PlayerAchievementDetail()
    {
        return view('pages.player-achievement-detail');
    }
}

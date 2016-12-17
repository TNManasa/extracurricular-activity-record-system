<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AchievementsController extends Controller
{
    public function newAchievement()
    {
        return view('achievements.new_achievement');
    }

    public function addNewAchievement(Request $request)
    {

    }
}
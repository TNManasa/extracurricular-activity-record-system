<?php

namespace App\Http\Controllers;

use App\Sport;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    public function getAllSports()
    {
        $all_sports = Sport::all();
        return view('sports.all_sports', [
            'all_sports' => $all_sports
        ]);
    }
}

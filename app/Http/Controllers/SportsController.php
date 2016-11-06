<?php

namespace App\Http\Controllers;

use App\Sport;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    public function getIndex()
    {
        $all_sports = Sport::all();
        return view('sports.index', [
            'all_sports' => $all_sports
        ]);
    }
}

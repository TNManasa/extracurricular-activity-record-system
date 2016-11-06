<?php

namespace App\Http\Controllers;

use App\Competition;
use Illuminate\Http\Request;

class CompetitionsController extends Controller
{
    public function getIndex()
    {
        $all_competitions = Competition::all();
        return view('competitions.index', [
            'all_competitions' => $all_competitions
        ]);
    }
}

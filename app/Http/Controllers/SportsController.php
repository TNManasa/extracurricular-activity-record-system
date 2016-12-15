<?php

namespace App\Http\Controllers;

use App\Sport;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    public function getIndex()
    {
        $all_sports = Sport::selectAll();

        dd($all_sports);

        return view('sports.index', [
            'all_sports' => $all_sports
        ]);


    }

    public function newSport()
    {
        return view('sports.new_sport');
    }

    public function addNewSport(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:60',
            'position' => 'required|max:20',
            'start_date' => 'required'
        ]);

        $sport = new Sport;
        $sport->title = $request->title;
        $sport->position = $request->position;
        $sport->start_date = $request->start_date;

        
    }
}



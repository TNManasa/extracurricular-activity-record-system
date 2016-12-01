<?php

namespace App\Http\Controllers;

use App\Competition;
use Illuminate\Http\Request;
use DB;

class CompetitionsController extends Controller
{
    public function getIndex()
    {
        $all_competitions = Competition::all();
        $raw_competitions = DB::select('select * from competitions');
        return view('competitions.index', [
            'all_competitions' => $all_competitions,
            'raw_competitions' => $raw_competitions
        ]);
    }

    public function newCompetition()
    {
        return view('competitions.new_competition');
    }

    public function addNewCompetition(Request $request)
    {
        dd($request);

        $this->validate($request, [
            'title' => 'required|max:60',
            'achievements' => 'required|max:100',
            'start_date' => 'required'
        ]);

        $competition = new Competition;
        $competition->title = $request->title;
        $competition->achievements = $request->achievements;
        $competition->start_date = $request->start_date;

        // TODO: Attach the authenticated Student ID before saving
        $competition->save();

    }
}

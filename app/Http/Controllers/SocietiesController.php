<?php

namespace App\Http\Controllers;

use App\Society;
use Illuminate\Http\Request;

class SocietiesController extends Controller
{
    public function getIndex()
    {
        $all_societies = Society::all();
        return view('societies.index', [
            'all_societies' => $all_societies
        ]);
    }

    public function newSociety()
    {
        return view('societies.new_society');
    }

    public function addNewSociety(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'position' => 'required',
            'start_date' => 'required'
        ]);

        $name = $request->name;
        $position = $request->position;
        $start_date = $request->start_date;

        $society = new Society;
        $society->name = $name;
        $society->position = $position;
        $society->start_date = $start_date;

        $society->save();
    }
}

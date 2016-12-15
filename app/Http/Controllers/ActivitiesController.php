<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function getNewActivityForm()
    {
        return view('activities.add_activity');
    }

    public function continueToAdd(Request $request)
    {
        $type = $request->type;
        if($type == "sport"){
            return redirect()->route('sports.new-sport');
        }else if($type == "organization"){
            return redirect()->route('organizations.new-organization');
        }else if($type == "competition"){
            return redirect()->route('competitions.new-competition');
        }else if($type == "achievement"){
            return redirect()->route('achievements.new-achievement');
        }
    }
}

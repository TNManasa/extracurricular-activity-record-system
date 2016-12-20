<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

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
            return redirect()->route('sports.new-sport-activity');
        }else if($type == "organization"){
            return redirect()->route('organizations.new-organization-activity');
        }else if($type == "competition"){
            return redirect()->route('competitions.new-competition-activity');
        }else if($type == "achievement"){
            return redirect()->route('achievements.new-achievement');
        }
    }

    public function getImage($activity_id){
        $path='/activities/'.$activity_id.'.jpg';
        $image=Storage::disk('local')->get($path);
        ob_end_clean();
        return new Response($image,200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Achievement;
use App\Activity;
use Illuminate\Http\Request;

class AchievementsController extends Controller
{
    public function newAchievement()
    {
        return view('achievements.new_achievement');
    }

    public function addNewAchievement(Request $request)
    {
//        $this->validate($request, [
//            'name' => 'required|max:60',
//            'position' => 'required|max:20',
//            'start_date' => 'required'
//        ]);

        $activity = new Activity();
        // TODO: Attach the authenticated Student ID before saving
        $activity->student_id = '140001A';
        $activity->activity_type= 4;
        if($request['no_time']=="1"){
            $activity->start_date=null;
            $activity->end_date=null;
        }else{
            $activity->start_date=$request['start_date'];
            $activity->end_date=$request['end_date'];
        }
        $activity->effort=$request['effort'];
        $activity->description=$request['description'];
//        dd($activity);
        Activity::insert($activity);

        $id=Activity::getId($activity);

        $achievement=new Achievement();
        $achievement->activity_id=$id;
        $achievement->achievement_name=$request['name'];
        Achievement::insert($achievement);

        return redirect()->back();

    }
}
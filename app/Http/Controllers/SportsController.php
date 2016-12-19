<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Sport;
use App\SportActivity;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    public function getIndex()
    {
        $all_sports = Sport::getAll();

        return view('sports.index', [
            'all_sports' => $all_sports
        ]);
    }

    public function newSportActivity()
    {
        $all_sports = Sport::getAll();

        return view('sports.new_sport_activity',['all_sports'=>$all_sports]);
    }

    public function addNewSportActivity(Request $request)
    {
//        $this->validate($request, [
//            'title' => 'required|max:60',
//            'position' => 'required|max:20',
//            'start_date' => 'required'
//        ]);

        $activity = new Activity();
        // TODO: Attach the authenticated Student ID before saving
        $activity->student_id = '140001A';
        $activity->activity_type= 2;
        $activity->start_date=$request['start_date'];
        $activity->end_date=$request['end_date'];
        $activity->effort=$request['effort'];
        $activity->description=$request['description'];
        Activity::insert($activity);

        $id=Activity::getId($activity);

        $sport_activity=new SportActivity();
        $sport_activity->id=$id;
        $sport_activity->sport_id=$request['name'];
        $sport_activity->role=$request['role'];
        SportActivity::insert($sport_activity);

        return redirect()->back();
    }

}



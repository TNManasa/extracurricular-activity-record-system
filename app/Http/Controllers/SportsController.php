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

    public function newSport()
    {
        return view('sports.new_sport');
    }

    public function addNewSport(Request $request)
    {
        $sport = new Sport();
        $sport -> name = $request['name'];

        Sport::insert($sport);

        return redirect()->back();
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

        if($request['image']==null){
            $activity->image=0;
        }else{
            $activity->image=1;
        }

        Activity::insert($activity);

        $id=Activity::getId($activity);

        if($activity->image==1){
            $image_name=$id.'.'.$request->file('image')->getClientOriginalExtension();

            if(!is_dir(base_path() . '/storage/app/activities/')){
                mkdir(base_path() . '/storage/app/activities/',0777,true);
            }

            $request->file('image')->move(base_path() . '/storage/app/activities/', $image_name);
        }

        $sport_activity=new SportActivity();
        $sport_activity->activity_id=$id;
        $sport_activity->sport_id=$request['name'];
        $sport_activity->role=$request['role'];
        SportActivity::insert($sport_activity);

        return redirect()->back();
    }

}



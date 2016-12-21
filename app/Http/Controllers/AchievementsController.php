<?php

namespace App\Http\Controllers;

use App\Achievement;
use App\Activity;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

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

        /*
        $activity = new Activity();
        $activity->student_id = User::findStudentIndex(Auth::id());
//        $activity->student_id = '140001A';
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

        $achievement=new Achievement();
        $achievement->activity_id=$id;
        $achievement->achievement_name=$request['name'];
        Achievement::insert($achievement);
        */

        //using function
        $student_id = User::findStudentIndex(Auth::id());
        $activity_type= 4;
        $start_date=$request['start_date'];
        $end_date=$request['end_date'];
        $effort=$request['effort'];
        $description=$request['description'];
        $image=0;
        if($request['image']==null){
            $image=0;
        }else{
            $image=1;
        }
        $achievement_name=$request['name'];

        $success_array=DB::select('call InsertAchievementActivity(?,?,?,?,?,?,?,?)', [$student_id, $activity_type, $start_date,$end_date,$effort, $description, $image,$achievement_name]);
        $var_success='@success';
        $var_id='@id';
        $success = $success_array[0]->$var_success;
        $id = $success_array[0]->$var_id;

        if($success==1){
            if($image==1){
                $image_name=$id.'.'.$request->file('image')->getClientOriginalExtension();

                if(!is_dir(base_path() . '/storage/app/activities/')){
                    mkdir(base_path() . '/storage/app/activities/',0777,true);
                }

                $request->file('image')->move(base_path() . '/storage/app/activities/', $image_name);
            }
        }


        return redirect()->route('students.dashboard');

    }
}
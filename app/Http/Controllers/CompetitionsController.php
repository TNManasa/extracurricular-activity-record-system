<?php

namespace App\Http\Controllers;

use App\Activity;
use App\CompetitionActivity;
use App\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class CompetitionsController extends Controller
{
    /* NO ALL COMPETITIONS
    public function getIndex()
    {
        $all_competitions = Competition::all();
        $raw_competitions = DB::select('select * from competitions');
        $comp1=new Competition();
        $comp1->name=$raw_competitions[0]->title;
        return view('competitions/index', [
            'all_competitions' => $all_competitions,
            'raw_competitions' => $raw_competitions,
            'comp'=>$comp1
        ]);
    }
    */

    public function newCompetitionActivity()
    {
        return view('competitions.new_competition_activity');
    }

    public function addNewCompetitionActivity(Request $request)
    {

//        $this->validate($request, [
//            'title' => 'required|max:60',
//            'achievements' => 'required|max:100',
//            'start_date' => 'required'
//        ]);

        /*
        $activity = new Activity();
        $activity->student_id = User::findStudentIndex(Auth::id());
//        $activity->student_id = '140001A';
        $activity->activity_type= 3;
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

        $competition_activity = new CompetitionActivity();
        $competition_activity->activity_id = $id;
        $competition_activity->competition_name = $request['name'];
        $competition_activity->status = $request['status'];
        CompetitionActivity::insert($competition_activity);
        */

        //using function
        $student_id = User::findStudentIndex(Auth::id());
        $activity_type= 3;
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
        $competition_name=$request['name'];
        $status=$request['status'];

        $success_array=DB::select('call InsertCompetitionActivity(?,?,?,?,?,?,?,?,?)', [$student_id, $activity_type, $start_date,$end_date,$effort, $description, $image,$competition_name,$status]);
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

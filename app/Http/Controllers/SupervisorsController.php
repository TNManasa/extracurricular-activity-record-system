<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupervisorsController extends Controller
{
    //
    public function supervisorView(){
        return view('supervisor');
    }
    
    public function pendingActivities(){
        $activities= DB::select('select * from activities ');
        //$activities= DB::select('select * from activities WHERE activities.id NOT IN (SELECT id FROM activities RIGHT JOIN validations on activities.id=validations.validation_id)');
        
        return $activities;
    }

    public function activityShow($id){
        $activity= DB::select('select * from activities where id = ?', [$id]);
        //return $activity;
        return view('supervisor.validate',compact('activity'));

    }
    public function activityValidate(Request $request, $id){
        $input=$request->all();
        $a=$input['option'];
        $affected = DB::update('update activities set rating = ? where id = ?', [$a,$id]);
        $affected2= DB::update('update activities set validated = 1 where id = ?', [$id]);
        $activities= DB::select('select * from activities where validated=0');

        return view('pending_activity',compact('activities'));
    }
}

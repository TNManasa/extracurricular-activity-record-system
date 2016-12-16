<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupervisorsController extends Controller
{
    //
    public function supervisorView(){
        return view('supervisor.supervisor');
    }


    
    public function pendingActivities(){
        $pendingActivities= DB::select('select * from activities WHERE activities.id NOT IN (SELECT id FROM activities RIGHT JOIN validations on activities.id=validations.validation_id)');
        
        return view('supervisor.pending_activity', compact('pendingActivities'));
        
    }

    public function validatedActivities(){
        $validatedActivities= DB::select('select * from activities WHERE activities.id  IN (SELECT id FROM activities RIGHT JOIN validations on activities.id=validations.validation_id WHERE is_validated=1)');
        return view('supervisor.validated_activities', compact('validatedActivities'));
    }

    public function rejectedActivities(){
        
    }

    public function activityShow($id){
        $activity= DB::select('select * from activities where id = ?', [$id]);
        //return $activity;
        return view('supervisor.validate',compact('activity'));

    }
    public function activityValidate(Request $request, $id){
        $input=$request->all();
        $a=$input['option'];
        $d=date("Y-m-d");
        DB::insert('insert into validations (validation_id,rating,supervisor_id,validated_date,is_validated ) values (?,?,?,?,?)', [$id,$a,'140B',$d,1]);
        //$affected2= DB::update('update activities set validated = 1 where id = ?', [$id]);
        //$activities= DB::select('select * from activities where validated=0');

        $pendingActivities= DB::select('select * from activities WHERE activities.id NOT IN (SELECT id FROM activities RIGHT JOIN validations on activities.id=validations.validation_id)');

        return view('supervisor.pending_activity', compact('pendingActivities'));
    }


}

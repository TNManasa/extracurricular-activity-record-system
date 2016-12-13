<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class supervisorsController extends Controller
{
    //
    public function supervisorView(){
        return view('supervisor');
    }
    
    public function pendingActivities(){
        $activities= DB::select('select * from activities where validated=0');
        
        return view('pending_activity',compact('activities'));
    }

    public function activityValidate($id){
        $activity= DB::select('select * from activities where id = ?', [$id]);
        //return $activity;
        return view('supervisor.validate',compact('activity'));

    }
}

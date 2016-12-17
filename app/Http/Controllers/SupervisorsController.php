<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class SupervisorsController extends Controller
{
    //
    public function supervisorView(){
        return view('supervisors.supervisor');
    }


    
    public function pendingActivities(){
        $pendingActivities= DB::select('select * from activities WHERE activities.id NOT IN (SELECT id FROM activities RIGHT JOIN validations on activities.id=validations.validation_id)');
        
        return view('supervisors.pending_activity', compact('pendingActivities'));
        
    }

    public function validatedActivities(){
        $validatedActivities= DB::select('select * from activities WHERE activities.id  IN (SELECT id FROM activities RIGHT JOIN validations on activities.id=validations.validation_id WHERE is_validated=1)');
        return view('supervisors.validated_activities', compact('validatedActivities'));
    }

    public function rejectedActivities(){
        
    }

    public function activityShow($id){
        $activity= DB::select('select * from activities where id = ?', [$id]);
        //return $activity;
        return view('supervisors.validate',compact('activity'));

    }
    public function activityValidate(Request $request, $id){
        $input=$request->all();
        $a=$input['option'];
        $d=date("Y-m-d");
        DB::insert('insert into validations (validation_id,rating,supervisor_id,validated_date,is_validated ) values (?,?,?,?,?)', [$id,$a,'140B',$d,1]);
        //$affected2= DB::update('update activities set validated = 1 where id = ?', [$id]);
        //$activities= DB::select('select * from activities where validated=0');

        $pendingActivities= DB::select('select * from activities WHERE activities.id NOT IN (SELECT id FROM activities RIGHT JOIN validations on activities.id=validations.validation_id)');

        return view('supervisors.pending_activity', compact('pendingActivities'));
    }

    public function newSupervisor()
    {
        return view('supervisors.register');
    }

    public function addNewSupervisor(Request $request)
    {
        $this->validate($request,[
            'emp_id' => 'required',
            'email' => 'required|email',
            'first_name' => 'required',
            'last_name' => 'required',
            'position' => 'required',
            'password' => 'required|same:confirm_password'
        ]);

        $emp_id = $request['emp_id'];
        $email= $request['email'];
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $position = $request['position'];
        $pwd = Crypt::encrypt($request['password']);

        //insert into users table
        //role should be removed later on .....
        $line1="insert into users (email,password,role) values (?,?,?)";
        DB::statement($line1,[$email,$pwd,"supervisor"]);

        //to fetch id, because there is no other way to get that foreign key
        $id1 = DB::select('select id from users where email = ?',[$email]);
        $id=null;
        foreach ($id1 as $user) {
            $id= $user->id;
        }

        $line2= "insert into supervisors (emp_id, first_name, last_name,position,user_id) values (?,?,?,?,?)";
        DB::insert($line2,[$emp_id,$first_name,$last_name,$position,$id]);

        return 'success';

    }

}

<?php

namespace App\Http\Controllers;

use App\Activity;
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
       // $pendingActivities= DB::select('select * from activities WHERE activities.id NOT IN (SELECT id FROM activities RIGHT JOIN validations on activities.id=validations.validation_id)');
        $pendingActivities= Activity::getPendingActivities();
        return view('supervisors.pending_activity', compact('pendingActivities'));
        
    }

    public function validatedActivities(){
        //$validatedActivities= DB::select('select * from activities WHERE activities.id  IN (SELECT id FROM activities RIGHT JOIN validations on activities.id=validations.validation_id WHERE is_validated=1)');
        $validatedActivities=Activity::getValidatedActivities();
        return view('supervisors.validated_activities', compact('validatedActivities'));
    }

    public function rejectedActivities(){
        
    }

    public function activityShow($id){
        //$activity= DB::select('select * from activities where id = ?', [$id]);
        $activity= DB::select('select *  FROM  (select first_name,last_name,index_no from students) as s RIGHT JOIN (select * from activities where id = ? ) as t on s.index_no=t.student_id', [$id]);
        $sport=DB::select('select name,role from sports RIGHT JOIN (select sport_id,role from sport_activities where s_id=?) as t on sports.id=t.sport_id ',[$id]);
        return $sport;
        //return $activity;
       // return $activity[0]->first_name;
       // return view('supervisors.validate',compact('activity'));

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
            'emp_id' => 'required|alpha_num',
            'email' => 'required|email',
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'position' => 'required|alpha',
            'password' => 'required|same:password_confirmation'
        ]);

        $emp_id = $request['emp_id'];
        $email= $request['email'];
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $position = $request['position'];
        $pwd = Crypt::encrypt($request['password']);

    //to check the uniqueness of employee number
        $checkEmpIdQuery=DB::select('select * from supervisors where emp_id = ?',[$emp_id]);
        if($checkEmpIdQuery!=null){
            return view('supervisors.register', ['customMessage' => 'the employee number you entered is already exists, check and enter your details again']);
        }

        //to check the uniqueness of email
        $checkEmailQuery=DB::select('select id from users where email = ?',[$email]);
        if($checkEmailQuery!=null){
            return view('supervisors.register', ['customMessage' => 'email is already acquired, try again']);
        }

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

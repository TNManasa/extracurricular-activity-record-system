<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class StudentsController extends Controller
{
    public function newStudent()
    {
        return view('students.register');
    }

    public function addNewStudent(Request $request)
    {

        $index_no=$request['index_no'];
        $first_name=$request['first_name'];
        $last_name=$request['last_name'];
        $dob=$request['dob'];
        $gender=$request['gender'];
        $faculty=$request['faculty'];
        $pwd=Crypt::encrypt($request['password']);
        $email= $request['email'];
        $role= 'student';

        //to update user table
        $line1="insert into users (email,password,role) values ('$email','$pwd','$role')";
        DB::insert($line1);

        //to fetch id, because there is no other way to get that foreign key
        $id1 = DB::select('select id from users where email = ?',[$email]);
        $id=null;
        foreach ($id1 as $user) {
            $id= $user->id;
        }


        //to update student table
        $line2= "insert into students (index_no, first_name, last_name,gender,faculty,user_id,dob) values ('$index_no','$first_name','$last_name','$gender','$faculty','$id','$dob')";
        DB::insert($line2);

        $passwd = DB::select('select password from users where email = ?',[$email]);
        $tempPwd=null;
        foreach ($passwd as $myPasswd) {
            $tempPwd= $myPasswd->password;
        }
        return Crypt::decrypt($tempPwd);
        return 'success';
    }
}

<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class StudentsController extends Controller
{
    public function getAllStudents()
    {
        $students = DB::select('select * from students');
        return view('students.all_students', [
            'students' => $students
        ]);
    }
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
        $batch=$request['batch'];
        $pwd=Crypt::encrypt($request['password']);
        $email= $request['email'];
        $role= 'student';

        //to update user table
        //becoz , first one is not the best practice
//        $line1="insert into users (email,password,role) values ('$email','$pwd','$role')";
        $line1="insert into users (email,password,role) values (?,?,?)";
        DB::statement($line1,[$email,$pwd,$role]);

        //to fetch id, because there is no other way to get that foreign key
        $id1 = DB::select('select id from users where email = ?',[$email]);
        $id=null;
        foreach ($id1 as $user) {
            $id= $user->id;
        }


        //to update student table
        //first one is  created by concatanating, abd it is not the best practice, Thats y second one
        //$line2= "insert into students (index_no, first_name, last_name,gender,faculty,user_id,dob) values ('$index_no','$first_name','$last_name','$gender','$faculty','$id','$dob')";

        $line2= "insert into students (index_no, first_name, last_name,gender,user_id,dob,batch) values (?,?,?,?,?,?,?)";
        DB::insert($line2,[$index_no,$first_name,$last_name,$gender,$id,$dob,$batch]);

        return 'success';
    }
}

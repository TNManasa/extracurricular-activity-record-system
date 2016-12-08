<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    public function getIndex()
    {
        return view('students.register');
    }

    public function addDetails(Request $request)
    {

        $index_no=$request['index_no'];
        $first_name=$request['first_name'];
        $last_name=$request['last_name'];
        $dob=$request['dob'];
        $gender=$request['gender'];
        $faculty=$request['faculty'];
        $pwd=$request['password'];

        $line= 'insert into students (index_no, first_name, last_name,gender,faculty,dob) values ("'.$index_no.'","'.$first_name.'","'.$last_name.'","'.$gender.'","'.$faculty.'","'.$dob.'")';


        DB::insert($line);
        return 1;
    }
}

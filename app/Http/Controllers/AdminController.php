<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function getIndex()
    {
        return view('admin.index');
    }
    public function getAllStudents()
    {
        $students = DB::select('select * from students');
        return view('admin.all_students', [
            'students' => $students
        ]);
    }

    public function getAllSupervisors()
    {
        $supervisors = DB::select('select * from supervisors');
        return view('admin.all_supervisors', [
            'supervisors' => $supervisors
        ]);
    }
}

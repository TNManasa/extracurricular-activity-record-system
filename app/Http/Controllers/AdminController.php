<?php

namespace App\Http\Controllers;

use App\Student;
use App\Supervisor;
use App\User;
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
        $students = Student::getAll();

        return view('admin.all_students', [
            'students' => $students
        ]);
    }

    public function getAllSupervisors()
    {
        $supervisors = Supervisor::getAll();
        return view('admin.all_supervisors', [
            'supervisors' => $supervisors
        ]);
    }

    public function flagUser($user_id){

        User::toggleFlag($user_id);
        return redirect()->back();
    }
}


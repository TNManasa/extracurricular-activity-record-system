<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function allStudents()
    {
        $students = Student::all();
        return view('admin.all_students', [
            'students' => $students
        ]);
    }
}

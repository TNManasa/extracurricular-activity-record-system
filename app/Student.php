<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Student
{
//    protected $fillable = ['index_no', 'first_name', 'last_name', 'gender', 'dob', 'batch', 'user_id'];

    public $index_no;
    public $first_name;
    public $last_name;
    public $gender;
    public $dob;
    public $batch;
    public $user_id;

    public $email;
    public $flag;




    public static function getAllStudents(){
        $raw_students = DB::select('select * from students');
        $students = [];

        foreach($raw_students as $student){
            $s = new Student();
            $s->index_no = $student->index_no;
            $s->first_name = $student->first_name;
            $s->last_name = $student->last_name;
            $s->gender = $student->gender;
            $s->dob = $student->dob;
            $s->batch = $student->batch;
            $s->user_id = $student->user_id;
            $s->email = User::getEmailById($student->user_id);
            $s->flag = User::getFlag($student->user_id);
            array_push($students, $s);
        }

        return $students;
    }
}
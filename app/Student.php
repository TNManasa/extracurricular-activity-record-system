<?php

namespace App;

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

    public static function getAll(){
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

    public static function findByIndexNo($index_no){
        $result = DB::select('select * from students where index_no=?', [$index_no])[0];
        $student = new Student();
        $student->index_no = $result->index_no;
        $student->first_name = $result->first_name;
        $student->last_name = $result->last_name;
        $student->gender = $result->gender;
        $student->dob = $result->dob;
        $student->batch = $result->batch;
        $student->user_id = $result->user_id;
        $student->email = User::getEmailById($result->user_id);
        $student->flag = User::getFlag($result->user_id);

        return $student;
    }

    public static function getSportsOfStudent($index_no){

    }

    public static function getOrganizationsOfStudent($index_no){

    }

    public static function getAchievementsOfStudent($index_no){

    }

    public static function getCompetitionsOfStudent($index_no){

    }
}


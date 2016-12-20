<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class Sport
{
    public $id;
    public $name;

    public static function getAll(){
        $sports_array = DB::select('select * from sports');
        $sports = array();
        foreach($sports_array as $sport){
            $s = new Sport();
            $s->id = $sport->id;
            $s->name = $sport->sport_name;
            array_push($sports, $s);
        }

        return $sports;
    }

    public static function findById($id){
        $s = DB::select('select * from sports where id=?', [$id])[0];
        $sport = new Sport();
        $sport->id = $s->id;
        $sport->name = $s->sport_name;

        return $sport;
    }

    public static function update(Sport $s){
        $id = $s->id;
        DB::statement('update sports set id=?,sport_name=? where id=?',[$id,$s->name,$id]);
        return true;
    }

    public static function getAllStudents(){
        $results_set = DB::select('select * from students where index_no in (select student_id from activities where activity_type=2)');
        if($results_set == null || empty($results_set)){
            return [];
        }

        $students = [];
        foreach($results_set as $result){
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

            array_push($students, $student);
        }

        return $students;
    }

    public static function getStudentsBySport($sport_id){
        $results_set = DB::select('select * from students where index_no in (select student_id from activities  join sport_activities on sport_activities.id=activities.id where activity_type=2 and sport_id=?)', [$sport_id]);
        if($results_set == null || empty($results_set)){
            return [];
        }

        $students = [];
        foreach($results_set as $result){
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

            array_push($students, $student);
        }

        return $students;
    }

    public static function insert(Sport $sport){
        DB::statement('insert into sports (sport_name) values (?)',[$sport->name]);
        return true;
    }

}

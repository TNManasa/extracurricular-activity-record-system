<?php

namespace App;

use Illuminate\Http\Request;
use DB;
use Exception;

class Sport
{
    public $id;
    public $name;

    public static function getAll(){
        try{
            $sports_array = DB::select('select * from sports');
            if($sports_array== null || empty($sports_array)){
                return [];
            }
            $sports = array();
            foreach($sports_array as $sport){
                $s = new Sport();
                $s->id = $sport->id;
                $s->name = $sport->sport_name;
                array_push($sports, $s);
            }

            return $sports;
        }catch (Exception $e){
            return [];
        }

    }

    public static function findById($id){
        try{
            $s = DB::select('select * from sports where id=?', [$id])[0];
            $sport = new Sport();
            $sport->id = $s->id;
            $sport->name = $s->sport_name;

            return $sport;
        }catch (Exception $e){
            return null;
        }

    }

    public static function update(Sport $s){
        $id = $s->id;
        try{
            DB::statement('update sports set id=?,sport_name=? where id=?',[$id,$s->name,$id]);
        }catch (Exception $e){
            return false;
        }
        return true;
    }

    public static function getAllStudents(){
        try{
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
        }catch (Exception $e){
            return [];
        }

    }

    public static function getStudentsBySport($sport_id){
        try{
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
        }catch (Exception $e){
            return [];
        }

    }

    public static function insert(Sport $sport){
        try{
            DB::statement('insert into sports (sport_name) values (?)',[$sport->name]);
        }catch (Exception $e){
            return false;
        }
        return true;
    }

}

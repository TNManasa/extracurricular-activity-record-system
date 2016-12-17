<?php

namespace App;

use DB;

class Activity
{

    public $id;
    public $student_id;
    public $activity_type;
    // 1 = Organization
    // 2 = Sport
    // 3 = Competition
    // 4 = Achievement
    public $start_date;
    public $end_date;
    public $effort;
    public $description;

    public static function getAll()
    {
        $raw_activities = DB::statment('select * from activities');
        $activities = array();
        foreach($raw_activities as $activity){
            $a = new Activity();
            $a->id = $activity->id;
            $a->student_id = $activity->student_id;
            $a->activity_type = $activity->activity_type;
            $a->start_date = $activity->start_date;
            $a->end_date = $activity->end_date;
            $a->effort = $activity->effort;
            $a->description = $activity->description;

            array_push($activities, $a);
        }
        return $activities;
    }

    public function findById($id)
    {
        $a = DB::select('select * from activities where id=?', [$id]);
        $activity = new Activity();
        $activity->id = $a->id;
        $activity->student_id = $a->student_id;
        $activity->activity_type = $a->activity_type;
        $activity->start_date = $a->start_date;
        $activity->end_date = $a->end_date;
        $activity->effort = $a->effort;
        $activity->description = $a->description;
        return $activity;
    }

    public static function update(Activity $activity){
        DB::statement('update activities set activity_type=?,start_date=?,end_date=?,effort=?,description=? where id=?',[$activity->activity_type,$activity->start_date,$activity->end_date,$activity->effort,$activity->description,$activity->id]);
        return true;
    }

    public static function insert(Activity $activity){
        DB::statement('insert into activities (student_id,activity_type,start_date,end_date,effort,description) values (?,?,?,?,?,?)',[$activity->student_id,$activity->activity_type,$activity->start_date,$activity->end_date,$activity->effort,$activity->description]);
        return true;
    }

    public static function getId(Activity $activity){
        $id=DB::select('select id from activities where student_id=? and activity_type=? and start_date=? and end_date=? and effort=? and description=?', [$activity->student_id,$activity->activity_type,$activity->start_date,$activity->end_date,$activity->effort,$activity->description]);
        return $id[0]->id;
    }
}

<?php

namespace App;

use DB;

class CompetitionActivity {

    public $activity_id;
    public $competition_name;
    public $status;

    public static function getAll()
    {
        $raw_competition_activities = DB::statment('select * from competition_activities');
        $competition_activities = array();
        foreach($raw_competition_activities as $competition_activity){
            $a = new CompetitionActivity();
            $a->activity_id = $competition_activity->c_id;
            $a->competition_name = $competition_activity->competition_name;
            $a->status = $competition_activity->status;

            array_push($competition_activities, $a);
        }
        return $competition_activities;
    }

    public function findById($id)
    {
        $a = DB::select('select * from competition_activities where c_id=?', [$id]);
        $competition_activity = new CompetitionActivity();
        $competition_activity->activity_id = $a->c_id;
        $competition_activity->competition_name = $a->competition_name;
        $competition_activity->status = $a->status;
        return $competition_activity;
    }

    public static function update(CompetitionActivity $competition_activity){
        DB::statement('update competition_activities set competioion_name=?,status=? where c_id=?',[$competition_activity->competition_name,$competition_activity->status,$competition_activity->activity_id]);
        return true;
    }

    public static function insert(CompetitionActivity $competition_activity){
        DB::statement('insert into competition_activities (c_id,competition_name,status) values (?,?,?)',[$competition_activity->activity_id,$competition_activity->competition_name,$competition_activity->status]);
        return true;
    }
}

<?php

namespace App;

use DB;
use Exception;

class CompetitionActivity {

    public $activity_id;
    public $competition_name;
    public $status;
    public $activity;

    public static function getAll()
    {
        try{
            $raw_competition_activities = DB::select('select * from competition_activities');
            if($raw_competition_activities== null || empty($raw_competition_activities)){
                return [];
            }
            $competition_activities = array();
            foreach($raw_competition_activities as $competition_activity){
                $a = new CompetitionActivity();
                $a->activity_id = $competition_activity->id;
                $a->competition_name = $competition_activity->competition_name;
                $a->status = $competition_activity->status;
                $a->activity = Activity::findById($a->activity_id);

                array_push($competition_activities, $a);
            }
            return $competition_activities;
        }catch(Exception $e){
            return [];
        }
    }

    public static function findById($id)
    {
        $a = DB::select('select * from competition_activities where id=?', [$id])[0];
        $competition_activity = new CompetitionActivity();
        $competition_activity->activity_id = $a->id;
        $competition_activity->competition_name = $a->competition_name;
        $competition_activity->status = $a->status;
        $competition_activity->activity = Activity::findById($a->id);

        return $competition_activity;
    }

    public static function update(CompetitionActivity $competition_activity){
        try {
            DB::statement('update competition_activities set competioion_name=?,status=? where id=?', [$competition_activity->competition_name, $competition_activity->status, $competition_activity->activity_id]);
        }catch (Exception $e){
            return false;
        }
        return true;
    }

    public static function insert(CompetitionActivity $competition_activity){
        try {
            DB::statement('insert into competition_activities (id,competition_name,status) values (?,?,?)', [$competition_activity->activity_id, $competition_activity->competition_name, $competition_activity->status]);
        }catch (Exception $e){
            return false;
        }
        return true;
    }
}

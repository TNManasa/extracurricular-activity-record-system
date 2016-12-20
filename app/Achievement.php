<?php

namespace App;

use DB;

class Achievement{

    public $activity_id;
    public $achievement_name;
    public $activity;

    public static function getAll()
    {
        $raw_achievements = DB::select('select * from achievements');
        $achievements = array();
        foreach($raw_achievements as $achievement){
            $a = new Achievement();
            $a->activity_id = $achievement->id;
            $a->achievement_name= $achievement->achievement_name;

            array_push($achievements, $a);
        }
        return $achievements;
    }

    public function findById($id)
    {
        try{
            $a = DB::select('select * from achievements where id=?', [$id])[0];
            $achievement = new Achievement();
            $achievement->activity_id = $a->id;
            $achievement->achievement_name = $a->achievement_name;
            $achievement->activity = Activity::findById($a->id);

            return $achievement;
        }catch(Exception $e){
            return [];
        }
    }

    public static function update(Achievement $achievement){
        DB::statement('update achievements set achievement_name=? where id=?',[$achievement->achievement_name,$achievement->activity_id]);
        return true;
    }

    public static function insert(Achievement $achievement){
        DB::statement('insert into achievements (id,achievement_name) values (?,?)',[$achievement->activity_id,$achievement->achievement_name]);
        return true;
    }

}

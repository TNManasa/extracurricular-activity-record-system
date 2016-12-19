<?php

namespace App;

use DB;

class Achievement{

    public $activity_id;
    public $achievement_name;


    public static function getAll()
    {
        $raw_achievements = DB::statment('select * from achievements');
        $achievements = array();
        foreach($raw_achievements as $achievement){
            $a = new Achievement();
            $a->activity_id = $achievement->a_id;
            $a->achievement_name= $achievement->achievement_name;

            array_push($achievements, $a);
        }
        return $achievements;
    }

    public function findById($id)
    {
        $a = DB::select('select * from achievements where a_id=?', [$id]);
        $achievement = new Achievement();
        $achievement->activity_id = $a->a_id;
        $achievement->achievement_name = $a->achievement_name;

        return $achievement;
    }

    public static function update(Achievement $achievement){
        DB::statement('update achievements set achievement_name=? where a_id=?',[$achievement->achievement_name,$achievement->activity_id]);
        return true;
    }

    public static function insert(Achievement $achievement){
        DB::statement('insert into achievements (a_id,achievement_name) values (?,?)',[$achievement->activity_id,$achievement->achievement_name]);
        return true;
    }

}

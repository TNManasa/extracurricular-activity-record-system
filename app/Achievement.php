<?php

namespace App;

use DB;

class Achievement{

    public $id;
    public $achievement_name;


    public static function getAll()
    {
        $raw_achievements = DB::statment('select * from achievements');
        $achievements = array();
        foreach($raw_achievements as $achievement){
            $a = new Achievement();
            $a->id = $achievement->id;
            $a->achievement_name= $achievement->achievement_name;

            array_push($achievements, $a);
        }
        return $achievements;
    }

    public function findById($id)
    {
        $a = DB::select('select * from achievements where id=?', [$id]);
        $achievement = new Achievement();
        $achievement->id = $a->id;
        $achievement->achievement_name = $a->achievement_name;

        return $achievement;
    }

    public static function update(Achievement $achievement){
        DB::statement('update achievements set achievement_name=? where id=?',[$achievement->achievement_name,$achievement->id]);
        return true;
    }

    public static function insert(Achievement $achievement){
        DB::statement('insert into achievements (id,achievement_name) values (?,?)',[$achievement->id,$achievement->achievement_name]);
        return true;
    }

}

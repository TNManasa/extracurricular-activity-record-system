<?php

namespace App;

use DB;
use Exception;

class Achievement{

    public $activity_id;
    public $achievement_name;
    public $activity;

    public static function getAll()
    {
        try{
            $raw_achievements = DB::select('select * from achievements');
            if($raw_achievements == null || empty($raw_achievements)){
                return [];
            }
            $achievements = array();
            foreach($raw_achievements as $achievement){
                $a = new Achievement();
                $a->activity_id = $achievement->id;
                $a->achievement_name= $achievement->achievement_name;

                array_push($achievements, $a);
            }
            return $achievements;
        }catch (Exception $e){
            return [];
        }

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
            return null;
        }
    }

    public static function update(Achievement $achievement){
        try{
            DB::statement('update achievements set achievement_name=? where id=?',[$achievement->achievement_name,$achievement->activity_id]);
        }catch(Exception $e){
            return false;
        }
        return true;
    }

    public static function insert(Achievement $achievement){
        try{
            DB::statement('insert into achievements (id,achievement_name) values (?,?)',[$achievement->activity_id,$achievement->achievement_name]);
        }catch (Exception $e){
            return false;
        }
        return true;
    }

}

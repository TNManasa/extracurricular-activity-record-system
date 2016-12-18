<?php

namespace App;

use DB;

class SportActivity
{
    public $id;
    public $sport_id;
    public $role;


    public static function getAll()
    {
        $raw_sport_activities = DB::select('select * from sport_activities');
        $sport_activities = array();
        foreach ($raw_sport_activities as $sport_activity) {
            $a = new SportActivity();
            $a->id = $sport_activity->id;
            $a->sport_id = $sport_activity->sport_id;
            $a->role = $sport_activity->role;

            array_push($sport_activities, $a);
        }
        return $sport_activities;
    }

    public static function findById($activity_id)
    {
        try {
            $a = DB::select('select * from sport_activities where id=?', [$activity_id]);
            if ($a == null || empty($a)) {
                return null;
            } else {
                $a = $a[0];
                $sport_activity = new SportActivity();
                $sport_activity->id = $a->id;
                $sport_activity->sport_id = $a->sport_id;
                $sport_activity->role = $a->role;
                return $sport_activity;
            }
        } catch (Exception $e) {
            echo "Exception: ". $e ."<br>";
            return null;
        }

    }

    public static function update(SportActivity $sport_activity)
    {
        DB::statement('update sport_activities set sport_id=?,role=? where id=?', [$sport_activity->sport_id, $sport_activity->role, $sport_activity->id]);
        return true;
    }

    public static function insert(SportActivity $sport_activity)
    {
        DB::statement('insert into sport_activities (id,sport_id,role) values (?,?,?)', [$sport_activity->id, $sport_activity->sport_id, $sport_activity->role]);
        return true;
    }
}

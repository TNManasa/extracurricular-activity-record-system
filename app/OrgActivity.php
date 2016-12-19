<?php

namespace App;

use DB;

class OrgActivity
{
    public $activity_id;
    public $org_id;
    public $project_name;
    public $role;


    public static function getAll()
    {
        $raw_org_activities = DB::statement('select * from org_activities');
        $org_activities = array();
        foreach($raw_org_activities as $org_activity){
            $a = new OrgActivity();
            $a->activity_id = $org_activity->o_id;
            $a->org_id = $org_activity->org_id;
            $a->project_name = $org_activity->project_name;
            $a->role = $org_activity->role;

            array_push($org_activities, $a);
        }
        return $org_activities;
    }

    public function findById($id)
    {
        $a = DB::select('select * from org_activities where o_id=?', [$id]);
        $org_activity = new OrgActivity();
        $org_activity->activity_id = $a->o_id;
        $org_activity->org_id = $a->org_id;
        $org_activity->project_name = $a->project_name;
        $org_activity->role = $a->role;
        return $org_activity;
    }

    public static function update(OrgActivity $org_activity){
        DB::statement('update org_activities set org_id=?,project_name=?,role=? where o_id=?',[$org_activity->org_id,$org_activity->project_name,$org_activity->role,$org_activity->activity_id]);
        return true;
    }

    public static function insert(OrgActivity $org_activity){
        DB::statement('insert into org_activities (o_id,org_id,project_name,role) values (?,?,?,?)',[$org_activity->activity_id,$org_activity->org_id,$org_activity->project_name,$org_activity->role]);
        return true;
    }

}

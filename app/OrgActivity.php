<?php

namespace App;

use DB;

class OrgActivity
{
    public $id;
    public $org_id;
    public $project_name;
    public $role;


    public static function getAll()
    {
        $raw_org_activities = DB::statment('select * from org_activities');
        $org_activities = array();
        foreach($raw_org_activities as $org_activity){
            $a = new OrgActivity();
            $a->id = $org_activity->id;
            $a->org_id = $org_activity->org_id;
            $a->project_name = $org_activity->project_name;
            $a->role = $org_activity->role;

            array_push($org_activities, $a);
        }
        return $org_activities;
    }

    public function findById($id)
    {
        $a = DB::select('select * from org_activities where id=?', [$id]);
        $org_activity = new OrgActivity();
        $org_activity->id = $a->id;
        $org_activity->org_id = $a->org_id;
        $org_activity->project_name = $a->project_name;
        $org_activity->role = $a->role;
        return $org_activity;
    }

    public static function update(OrgActivity $org_activity){
        DB::statement('update org_activities set org_id=?,project_name=?,role=? where id=?',[$org_activity->org_id,$org_activity->project_name,$org_activity->role,$org_activity->id]);
        return true;
    }

    public static function insert(OrgActivity $org_activity){
        DB::statement('insert into org_activities (id,org_id,project_name,role) values (?,?,?,?)',[$org_activity->id,$org_activity->org_id,$org_activity->project_name,$org_activity->role]);
        return true;
    }

}

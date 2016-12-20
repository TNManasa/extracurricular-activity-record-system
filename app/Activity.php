<?php

namespace App;

use DB;

class Activity
{

    public $id;
    public $student_id;
    public $activity_type;
    /*
     keys for activity_type
     1 = Organization, 2 = Sport, 3 = Competition, 4 = Achievement
    */
    public $start_date;
    public $end_date;
    public $effort;
    public $description;
    public $s_first_name;
    public $s_last_name;
    public $institute_name;
    public $activity_name;
    public $role;

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
        if($activity->end_date==null and $activity->start_date==null){
            $id=DB::select('select id from activities where student_id=? and activity_type=? and effort=? and description=?', [$activity->student_id,$activity->activity_type,$activity->effort,$activity->description]);
        }else{
            $id=DB::select('select id from activities where student_id=? and activity_type=? and start_date=? and end_date=? and effort=? and description=?', [$activity->student_id,$activity->activity_type,$activity->start_date,$activity->end_date,$activity->effort,$activity->description]);
        }
        return $id[0]->id;
    }

    public static function getPendingActivities(){
        $p_activities= DB::select('select * from activities WHERE activities.id NOT IN (SELECT id FROM activities RIGHT JOIN validations on activities.id=validations.validation_id)');
        $pending_activities=array();
        foreach($p_activities as $activity){
            $b = new Activity();
            $b->id = $activity->id;
            $b->student_id = $activity->student_id;
            $b->activity_type = $activity->activity_type;
            $b->start_date = $activity->start_date;
            $b->end_date = $activity->end_date;
            $b->effort = $activity->effort;
            $b->description = $activity->description;

            array_push($pending_activities, $b);
        }
        return $pending_activities;

    }

    public static function getValidatedActivities(){
        $v_activities= DB::select('select * from activities WHERE activities.id  IN (SELECT id FROM activities RIGHT JOIN validations on activities.id=validations.validation_id WHERE is_validated=1)');
        $validated_activities=array();
        foreach($v_activities as $activity){
            $b = new Activity();
            $b->id = $activity->id;
            $b->student_id = $activity->student_id;
            $b->activity_type = $activity->activity_type;
            $b->start_date = $activity->start_date;
            $b->end_date = $activity->end_date;
            $b->effort = $activity->effort;
            $b->description = $activity->description;

            array_push($validated_activities, $b);
        }
        return $validated_activities;
    }

    public static function showPendingActivity($id){
        $activity= DB::select('select *  FROM  (select first_name,last_name,index_no from students) as s RIGHT JOIN (select * from activities where id = ? ) as t on s.index_no=t.student_id', [$id]);
        $activities=array();
        $a=$activity[0];
            $b = new Activity();
            $b->id = $a->id;
            $b->student_id = $a->student_id;
            $b->activity_type = $a->activity_type;
            $b->start_date = $a->start_date;
            $b->end_date = $a->end_date;
            $b->effort = $a->effort;
            $b->description = $a->description;
            $b->s_first_name=$a->first_name;
            $b->s_last_name=$a->last_name;
            if($a->activity_type==1){
                $org=DB::select('select name,project_name,role from organizations RIGHT JOIN (select org_id,project_name,role from org_activities where o_id=?) as t on organizations.id=t.org_id ',[$id]);
                $b->activity_name=$org[0]->project_name;
                $b->role=$org[0]->role;
                $b->institute_name=$org[0]->name;

            }elseif ($a->activity_type==2){
                $sport=DB::select('select name,role from sports RIGHT JOIN (select sport_id,role from sport_activities where s_id=?) as t on sports.id=t.sport_id ',[$id]);
                $b->activity_name=$sport[0]->role;
                $b->role=$sport[0]->role;
                $b->institute_name=$sport[0]->name;

            }elseif ($a->activity_type==3){
                $competition=DB::select('select competition_name,status from competition_activities WHERE c_id = ?',[$id]);
                $b->activity_name=$competition[0]->competition_name;
                $b->role=$competition[0]->status;
            }elseif ($a->activity_type==4){
                $achievement=DB::select('select achievement_name from achievements WHERE a_id = ?',[$id]);
                $b->role=$achievement[0]->achievement_name;
            }
            return $b;

        }



}

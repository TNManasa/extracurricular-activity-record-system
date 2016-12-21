<?php

namespace App;

use DB;
use Exception;

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
    public $image;
    public $s_first_name;
    public $s_last_name;
    public $institute_name;
    public $activity_name;
    public $role;
    public $supervisor_name;

    public static function getAll()
    {
        try {
            $raw_activities = DB::statment('select * from activities');
            if($raw_activities== null || empty($raw_activities)){
                return [];
            }
            $activities = array();
            foreach ($raw_activities as $activity) {
                $a = new Activity();
                $a->id = $activity->id;
                $a->student_id = $activity->student_id;
                $a->activity_type = $activity->activity_type;
                $a->start_date = $activity->start_date;
                $a->end_date = $activity->end_date;
                $a->effort = $activity->effort;
                $a->description = $activity->description;
                $a->image = $activity->image;

                array_push($activities, $a);
            }
            return $activities;
        }catch (Exception $e){
            return [];
        }
    }

    public static function findById($id)
    {
        try{
            $a = DB::select('select * from activities where id=?', [$id])[0];
            if($a== null || empty($a)){
                return [];
            }
            $activity = new Activity();
            $activity->id = $a->id;
            $activity->student_id = $a->student_id;
            $activity->activity_type = $a->activity_type;
            $activity->start_date = $a->start_date;
            $activity->end_date = $a->end_date;
            $activity->effort = $a->effort;
            $activity->description = $a->description;
            $activity->image=$a->image;
            return $activity;
        }catch(Exception $e){
            return [];
        }
    }

    public static function update(Activity $activity){
        try {
            DB::statement('update activities set activity_type=?,start_date=?,end_date=?,effort=?,description=?,image=? where id=?', [$activity->activity_type, $activity->start_date, $activity->end_date, $activity->effort, $activity->description, $activity->image, $activity->id]);
        }catch (Exception $e){
            return false;
        }
        return true;
    }

    public static function insert(Activity $activity){
        try{
            DB::statement('insert into activities (student_id,activity_type,start_date,end_date,effort,description,image) values (?,?,?,?,?,?,?)',[$activity->student_id,$activity->activity_type,$activity->start_date,$activity->end_date,$activity->effort,$activity->description,$activity->image]);
        }catch (Exception $e){
            return false;
        }
        return true;
    }

    public static function getId(Activity $activity){
        try {
            if ($activity->end_date == null and $activity->start_date == null) {
                $id = DB::select('select id from activities where student_id=? and activity_type=? and effort=? and description=? and image=?', [$activity->student_id, $activity->activity_type, $activity->effort, $activity->description, $activity->image]);
            } else {
                $id = DB::select('select id from activities where student_id=? and activity_type=? and start_date=? and end_date=? and effort=? and description=? and image=?', [$activity->student_id, $activity->activity_type, $activity->start_date, $activity->end_date, $activity->effort, $activity->description, $activity->image]);
            }
            if($id== null || empty($id)){
                return null;
            }
            return $id[0]->id;
        }catch (Exception $e){
            return null;
        }
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
            $b->image=$activity->image;

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
            $b->image=$activity->image;

            array_push($validated_activities, $b);
        }
        return $validated_activities;
    }

    public static function getRejectedActivities(){
        $v_activities= DB::select('select * from activities WHERE activities.id  IN (SELECT id FROM activities RIGHT JOIN validations on activities.id=validations.validation_id WHERE is_validated=0)');
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
            $b->image=$activity->image;

            array_push($validated_activities, $b);
        }
        return $validated_activities;
    }

    public static function showPendingActivity($id){
        //$activity= DB::select('select *  FROM  (select first_name,last_name,index_no from students) as s RIGHT JOIN (select * from activities where id = ? ) as t on s.index_no=t.student_id', [$id]);
        $activity=DB::select('select * from student_activity where id=?',[$id]);
        $isValidated=Validation::findByID($id);
        $a=$activity[0];
            $b = new Activity();
            $b->id = $a->id;
            
            $b->student_id = $a->student_id;
            $b->activity_type = $a->activity_type;
            $b->start_date = $a->start_date;
            $b->end_date = $a->end_date;
            $b->effort = $a->effort;
            $b->description = $a->description;
            $b->image = $a->image;
            $b->s_first_name=$a->first_name;
            $b->s_last_name=$a->last_name;
            if($a->activity_type==1){
                $org=DB::select('select organization_name,project_name,role from organizations RIGHT JOIN (select org_id,project_name,role from org_activities where id=?) as t on organizations.id=t.org_id ',[$id]);
                $b->activity_name=$org[0]->project_name;
                $b->role=$org[0]->role;
                $b->institute_name=$org[0]->organization_name;

            }elseif ($a->activity_type==2){
                $sport=DB::select('select sport_name,role from sports RIGHT JOIN (select sport_id,role from sport_activities where id=?) as t on sports.id=t.sport_id ',[$id]);
                $b->activity_name=$sport[0]->role;
                $b->role=$sport[0]->role;
                $b->institute_name=$sport[0]->sport_name;

            }elseif ($a->activity_type==3){
                $competition=DB::select('select competition_name,status from competition_activities WHERE id = ?',[$id]);
                $b->institute_name=$competition[0]->competition_name;
                $b->role=$competition[0]->status;
            }elseif ($a->activity_type==4){
                $achievement=DB::select('select achievement_name from achievements WHERE id = ?',[$id]);
                $b->role=$achievement[0]->achievement_name;
                $b->institute_name="";
            }
            if(!($isValidated==null)){
                $b->supervisor_name=Supervisor::getNameByID($isValidated->supervisor_id);
                $array=array();
                array_push($array,$b );
                array_push($array,$isValidated );
                return $array;

            }else {
                return $b;
            }
        }
}

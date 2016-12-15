<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity
{
    protected $fillable = ['index_no', 'first_name', 'last_name', 'gender', 'dob', 'batch', 'user_id'];

    public $index_no;
    public $first_name;
    public $last_name;
    public $gender;
    public $dob;
    public $batch;
    public $user_id;

    public static function selectAll()
    {
        $raw_activities = DB::statment('select * from activities');
        $activities = array();
        foreach($raw_activities as $activity){
            $a = new Activity();
            $a->index_no = $activity->index_no;
            $a->first_name = $activity->first_name;
            $a->last_name = $activity->last_name;
            $a->gender = $activity->gender;
            $a->dob = $activity->dob;
            $a->batch = $activity->batch;
            $a->user_id = $activity->user_id;

            array_push($activities, $a);

            return $activities;
        }
    }

    public function findById($id)
    {
        $a = DB::select('select * from activities where id=', [$id]);
        $activity = new Activity();
        $activity->id = $a->id;
    }

    public static function update(Activity $activity){
        DB::statement('update activities set 
                    index_no=?, 
                      first_name=?, 
                      last_name=?, 
                      gender=?, 
                      dob=?,
                      batch=?,
                      user_id=?',
                        [$activity->index_no,
                        $activity->first_name,
                        $activity->last_name,
                        $activity->gender,
                        $activity->dob,
                        $activity->batch,
                        $activity->user_id]);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Supervisor
{
    public $emp_id;
    public $first_name;
    public $last_name;
    public $position;
    public $user_id;
    public $email;

    public static function getAllSupervisors(){
        $raw_supervisors = DB::select('select * from supervisors');
        $supervisors = [];

        foreach ($raw_supervisors as $supervisor){
            $s = new Supervisor();
            $s->emp_id = $supervisor->emp_id;
            $s->first_name = $supervisor->first_name;
            $s->last_name = $supervisor->last_name;
            $s->position = $supervisor->position;
            $s->user_id = $supervisor->user_id;
            $s->email = User::getEmailById($supervisor->user_id);

            array_push($supervisors, $s);
        }

        return $supervisors;
    }


}

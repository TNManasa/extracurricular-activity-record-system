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
    public $flag;

    public static function getAll(){
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
            $s->flag = User::getFlag($supervisor->user_id);

            array_push($supervisors, $s);
        }

        return $supervisors;
    }

    public static function getNameByID($ID){
        $supervisor_name= DB::select('select concat(first_name," ",last_name) as name from supervisors where emp_id =?',["140B"]);
        $str= $supervisor_name[0]->name;
        return $str;
    }


}

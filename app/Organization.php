<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Organization
{
//    protected $fillable = ['id', 'name'];
    public $id;
    public $name;

    public static function getAll(){
        $raw_organizations = DB::select('select * from organizations');
        $organizations = [];
        foreach ($raw_organizations as $organization){
            $o = new Organization();
            $o->id = $organization->id;
            $o->name = $organization->name;
            array_push($organizations, $o);
        }

        return $organizations;
    }

    public static function findById($id){
        $results_set = DB::select('select * from organizations where id=?', [$id]);
        try{
            $o = $results_set[0];
            $organization = new Organization();
            $organization->id = $o->id;
            $organization->name = $o->name;
            return $organization;
        }catch(Exception $e){
            echo "<br>Error: $e<br>";
            return [];
        }
    }

    public static function getAllStudents(){

    }

}

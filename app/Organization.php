<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Organization
{
    protected $fillable = ['id', 'name'];
    public $id;
    public $name;

    public static function selectAll(){
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
}

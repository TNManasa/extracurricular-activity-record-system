<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class Sport
{
    public $id;
    public $name;

    public static function getAll(){
        $sports_array = DB::select('select * from sports');
        $sports = array();
        foreach($sports_array as $sport){
            $s = new Sport();
            $s->id = $sport->id;
            $s->name = $sport->name;
            array_push($sports, $s);
        }

        return $sports;
    }

    public static function findById($id){
        $s = DB::select('select * from sports where id=?', [$id]);
        $sport = new Sport();
        $sport->id = $s->id;
        $sport->name = $s->name;

        return $sport;
    }

    public static function update(Sport $s){
        $id = $s->id;
        DB::statement('update sports set id=?,name=? where id=?',[$id,$s->name,$id]);
        return true;
    }


}

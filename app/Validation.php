<?php

namespace App;


use DB;

class Validation
{
    //
    public $validation_id;
    public $rating;
    public $supervisor_id;
    public $validated_date;
    public $is_validated;

    public static function findByID($id){

        $a = DB::select('select * from validations where validation_id=?', [$id]);
        if(!emptyArray($a)) {
            $validation = new Activity();
            $validation->validation_id = $a->validation_id;
            $validation->rating = $a->rating;
            $validation->supervisor_id = $a->supervisor_id;
            $validation->validated_date = $a->validated_date;
            $validation->is_validated = $a->is_validate;

            return $validation;
        }else{
            return false;
        }
    }
}

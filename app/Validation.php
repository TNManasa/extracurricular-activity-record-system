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
        if(empty($a)) {
            return null;
        }else{

            $validation = new Validation();
            $validation->validation_id = $a[0]->validation_id;
            $validation->rating = $a[0]->rating;
            $validation->supervisor_id = $a[0]->supervisor_id;
            $validation->validated_date = $a[0]->validated_date;
            $validation->is_validated = $a[0]->is_validated;

            return $validation;
        }
    }
}

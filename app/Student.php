<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['index_no', 'first_name', 'last_name', 'gender', 'dob', 'batch', 'user_id'];
}

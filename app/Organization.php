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
            $o->name = $organization->organization_name;
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
            $organization->name = $o->organization_name;
            return $organization;
        }catch(Exception $e){
            echo "<br>Error: $e<br>";
            return [];
        }
    }

    public static function getAllStudents(){
        $results_set = DB::select('select * from students where index_no in (select student_id from activities where activity_type=1)');
        if($results_set == null || empty($results_set)){
            return null;
        }

        $students = [];
        foreach($results_set as $result){
            $student = new Student();
            $student->index_no = $result->index_no;
            $student->first_name = $result->first_name;
            $student->last_name = $result->last_name;
            $student->gender = $result->gender;
            $student->dob = $result->dob;
            $student->batch = $result->batch;
            $student->user_id = $result->user_id;
            $student->email = User::getEmailById($result->user_id);
            $student->flag = User::getFlag($result->user_id);

            array_push($students, $student);
        }

        return $students;
    }

    public static function getStudentsByOrganization($organization_id){
        $results_set = DB::select('select * from students where index_no in (select student_id from activities  join org_activities on org_activities.id=activities.id where activity_type=1 and org_id=?)', [$organization_id]);
        if($results_set == null || empty($results_set)){
            return [];
        }

        $students = [];
        foreach($results_set as $result){
            $student = new Student();
            $student->index_no = $result->index_no;
            $student->first_name = $result->first_name;
            $student->last_name = $result->last_name;
            $student->gender = $result->gender;
            $student->dob = $result->dob;
            $student->batch = $result->batch;
            $student->user_id = $result->user_id;
            $student->email = User::getEmailById($result->user_id);
            $student->flag = User::getFlag($result->user_id);

            array_push($students, $student);
        }

        return $students;
    }

    public static function insert(Organization $organization){
        DB::statement('insert into organizations (organization_name) values (?)',[$organization->name]);
        return true;
    }

}

<?php

namespace App;

use DB;
use Exception;

class Organization
{
//    protected $fillable = ['id', 'name'];
    public $id;
    public $name;

    public static function getAll(){
        try{
            $raw_organizations = DB::select('select * from organizations');
            if($raw_organizations== null || empty($raw_organizations)){
                return [];
            }
            $organizations = [];
            foreach ($raw_organizations as $organization){
                $o = new Organization();
                $o->id = $organization->id;
                $o->name = $organization->organization_name;
                array_push($organizations, $o);
            }

            return $organizations;
        }catch (Exception $e){
            return [];
        }
    }

    public static function findById($id){
        try{
            $results_set = DB::select('select * from organizations where id=?', [$id]);
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
        try {
            $results_set = DB::select('select * from students where index_no in (select student_id from activities where activity_type=1)');
            if ($results_set == null || empty($results_set)) {
                return null;
            }

            $students = [];
            foreach ($results_set as $result) {
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
        }catch (Exception $e){
            return null;
        }
    }

    public static function getStudentsByOrganization($organization_id){
        try {
            $results_set = DB::select('select * from students where index_no in (select student_id from activities  join org_activities on org_activities.id=activities.id where activity_type=1 and org_id=?)', [$organization_id]);
            if ($results_set == null || empty($results_set)) {
                return [];
            }

            $students = [];
            foreach ($results_set as $result) {
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
        }catch (Exception $e){
            return [];
        }
    }

    public static function insert(Organization $organization){
        try{
            DB::statement('insert into organizations (organization_name) values (?)',[$organization->name]);
        }catch (Exception $e){
            return false;
        }
        return true;
    }

}

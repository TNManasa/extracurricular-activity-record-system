<?php

namespace App\Http\Controllers;

use App\Organization;
use App\Sport;
use App\Student;
use App\Supervisor;
use App\User;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    public function getIndex()
    {
        $all_sports = Sport::getAll();
        $all_organizations = Organization::getAll();
        return view('admin.index', [
            'sports' => $all_sports,
            'organizations' => $all_organizations
        ]);
    }
    public function getAllStudents()
    {
        $students = Student::getAll();

        return view('admin.all_students', [
            'students' => $students
        ]);
    }

    public function getAllSupervisors()
    {
        $supervisors = Supervisor::getAll();
        return view('admin.all_supervisors', [
            'supervisors' => $supervisors
        ]);
    }

    public function flagUser($user_id){
        User::toggleFlag($user_id);
        return redirect()->back();
    }

    public function getStudentProfile($index_no)
    {
        $student = Student::findByIndexNo($index_no);
        $sports = Student::getSportsOfStudent($index_no);
        $organizations = Student::getOrganizationsOfStudent($index_no);

        return view('admin.student_profile',[
            'student' => $student,
            'sports' => $sports,
            'organizations' => $organizations
        ]);
    }

    public function getSportProfile($sport_id)
    {
        $sport = Sport::findById($sport_id);
        $students = Sport::getStudentsBySport($sport_id);
        return view('sports.profile', [
            'sport' => $sport,
            'students' => $students
        ]);
    }

    public function getOrganizationProfile($organization_id)
    {
        $organization = Organization::findById($organization_id);
        $students = Organization::getStudentsByOrganization($organization_id);
        return view('organizations.profile', [
            'organization' => $organization,
            'students' => $students
        ]);
    }
}


<?php

namespace App\Http\Controllers;

use App\Activity;
use App\OrgActivity;
use App\Organization;
use Illuminate\Http\Request;

use DB;

class OrganizationsController extends Controller
{
    public function getIndex()
    {
        $all_organizations = Organization::getAll();
        return view('organizations.index', [
            'all_organizations' => $all_organizations
        ]);
    }

    public function newOrganizationActivity()
    {
        $all_organizations = Organization::getAll();
        return view('organizations.new_organization_activity',['all_organizations' => $all_organizations]);
    }

    public function addNewOrganizationActivity(Request $request)
    {
//        $this->validate($request, [
//            'name' => 'required|max:60',
//            'position' => 'required|max:60',
//            'start_date' => 'required'
//        ]);

        $activity = new Activity();
        $activity->student_id = '140001A'; // auth student
        $activity->activity_type= 1;
        $activity->start_date=$request['start_date'];
        $activity->end_date=$request['end_date'];
        $activity->effort=$request['effort'];
        $activity->description=$request['description'];
        Activity::insert($activity);

        $id=Activity::getId($activity);

        $org_activity=new OrgActivity();
        $org_activity->id=$id;
        $org_activity->org_id=$request['name'];
        $org_activity->role=$request['role'];
        $org_activity->project_name=$request['project_name'];
        OrgActivity::insert($org_activity);

        return redirect()->back();
    }
}

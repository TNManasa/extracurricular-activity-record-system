<?php

namespace App\Http\Controllers;

use App\Activity;
use App\OrgActivity;
use App\Organization;
use App\User;
use Illuminate\Http\Request;

use DB;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OrganizationsController extends Controller
{
    public function getIndex()
    {
        $all_organizations = Organization::getAll();
        return view('organizations.index', [
            'all_organizations' => $all_organizations
        ]);
    }

    public function newOrganization()
    {
//        dd(Auth::user()->id);
        return view('organizations.new_organization');
    }

    public function addNewOrganization(Request $request)
    {
        $organization = new Organization();
        $organization -> name = $request['name'];
        $image_name=$request['name'].'.'.$request->file('logo')->getClientOriginalExtension();

        if(!is_dir(base_path() . '/storage/app/organizations/')){
            mkdir(base_path() . '/storage/app/organizations/',0777,true);
        }

        $request->file('logo')->move(base_path() . '/storage/app/organizations/', $image_name);

        Organization::insert($organization);

        return redirect()->back();
    }

    public function getLogo($logo_name){
        $path='/organizations/'.$logo_name.'.png';
        $logo=Storage::disk('local')->get($path);
        ob_end_clean();
        return new Response($logo,200);
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
        // TODO: Attach the authenticated Student ID before saving

        $activity->student_id = User::findStudentIndex(Auth::id());
//        $activity->student_id = '140001A';
        $activity->activity_type= 1;
        $activity->start_date=$request['start_date'];
        $activity->end_date=$request['end_date'];
        $activity->effort=$request['effort'];
        $activity->description=$request['description'];

        if($request['image']==null){
            $activity->image=0;
        }else{
            $activity->image=1;
        }

        Activity::insert($activity);

        $id=Activity::getId($activity);

        if($activity->image==1){
            $image_name=$id.'.'.$request->file('image')->getClientOriginalExtension();

            if(!is_dir(base_path() . '/storage/app/activities/')){
                mkdir(base_path() . '/storage/app/activities/',0777,true);
            }

            $request->file('image')->move(base_path() . '/storage/app/activities/', $image_name);
        }

        $org_activity=new OrgActivity();
        $org_activity->activity_id=$id;
        $org_activity->org_id=$request['name'];
        $org_activity->role=$request['role'];
        $org_activity->project_name=$request['project_name'];
        OrgActivity::insert($org_activity);

        return redirect()->back();
    }

}

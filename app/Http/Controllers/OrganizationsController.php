<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;

class OrganizationsController extends Controller
{
    public function getIndex()
    {
        $all_societies = Organization::all();
        return view('organizations.index', [
            'all_societies' => $all_societies
        ]);
    }

    public function newOrganization()
    {
        return view('organizations.new_organization');
    }

    public function addNewOrganization(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:60',
            'position' => 'required|max:60|before:today',
            'start_date' => 'required'
        ]);

        $name = $request->name;
        $position = $request->position;
        $start_date = $request->start_date;

        $organization = new Organization;
        $organization->name = $name;
        $organization->position = $position;
        $organization->start_date = $start_date;

        $organization->save();
    }
}

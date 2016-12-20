@extends('layouts.master')

@section('title')
    Societies | ECAM
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2>All Societies</h2>
            <ul class="list-group">
                @foreach($all_organizations as $organization)
                    <li class="list-group-item"><img src="{{route('organizations.get-logo',['logo_name'=>$organization->logo])}}" style="width: 50px; height: 50px"> <a href="">{{ $organization->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@stop
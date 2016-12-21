@extends('layouts.master')

@section('title')
    Admin Home | ECAM
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="container">
                        <h3>Select Action</h3>
                    </div>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="{{ route('admin.all-students') }}">View All Students</a></li>
                        <li class="list-group-item"><a href="{{ route('admin.all-supervisors') }}">View All Supervisors</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <a href="{{ route('sports.new-sport') }}" class="btn btn-default">Add New Sport</a>
            <a href="{{ route('organizations.new-organization') }}" class="btn btn-default">Add New Organization</a>
            <a href="{{ route('supervisors.register') }}" class="btn btn-default">Add Supervisor</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Sports</h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($sports as $sport)
                            <li class="list-group-item"><a href="{{ route('admin.sport-profile', [$sport->id]) }}">{{ $sport->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    {{--</div>--}}

    {{--<div class="row">--}}
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Organizations</h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($organizations as $organization)
                            <li class="list-group-item"><img src="{{route('organizations.get-logo',['logo_name'=>$organization->name])}}" style="width: 40px; height: 40px">&nbsp;&nbsp;<a href="{{ route('admin.organization-profile', [$organization->id]) }}">{{ $organization->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Competitions</h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($competitions as $competition)
                            <li class="list-group-item">{{ $competition->competition_name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    {{--</div>--}}

    {{--<div class="row">--}}
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Achievements</h3>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($achievements as $achievement)
                            <li class="list-group-item">{{ $achievement->achievement_name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop

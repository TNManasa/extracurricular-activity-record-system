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
                        <a href="{{ route('admin.all-students') }}"><li class="list-group-item btn btn-primary">View All Students</li></a>
                        <a href="{{ route('admin.all-supervisors') }}"><li class="list-group-item btn btn-primary">View All Supervisors</li></a>
                    </ul>
                </div>
            </div>
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
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Organizations
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($organizations as $organization)
                            <li class="list-group-item"><a href="{{ route('admin.organization-profile', [$organization->id]) }}">{{ $organization->name }}</a></li>
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
                    Competitions
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Achievements
                </div>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>
@stop

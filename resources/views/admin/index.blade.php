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
                        <a href="{{ route('admin.all-students') }}"><li class="list-group-item">View All Students</li></a>
                        <a href="{{ route('admin.all-supervisors') }}"><li class="list-group-item">View All Supervisors</li></a>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-head">

                </div>
            </div>
        </div>
    </div>
@stop


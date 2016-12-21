{{--For the use of Student--}}
@extends('layouts.master')

@section('title')
    Dashboard | Student| ECAM
    {{--For the use of Student--}}
@stop

@section('content')
    {{--For the use of Student--}}
    <div class="row">
        <div class="col-md-6">
            {{--<div class="jumbotron">--}}
            <ul class="list-group">
                <li class="list-group-item">Name: {{ $student->first_name }} {{ $student->last_name }}
                    @if($student->flag)
                        <div class="label label-danger">You've been flagged by the HoD</div>
                    @endif
                </li>
                <li class="list-group-item">Index No: {{ $student->index_no }}</li>
                <li class="list-group-item">Gender: {{ $student->gender }}</li>
                <li class="list-group-item">Email: {{ $student->email }}</li>
                <li class="list-group-item">DoB: {{ $student->dob }}</li>
                <li class="list-group-item">Batch: {{ $student->batch }}</li>
            </ul>
            {{--</div>--}}
        </div>
        <div class="col-md-6">
            <a href="{{ route('activities.new-activity') }}" class="btn btn-primary">Add New Activity</a>
        </div>
    </div>
    <hr><br>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>My Activities</h3>
        </div>
    </div>

    <div>
        <h3>Sports</h3>
        <div class="row">
        @foreach($sports as $sport)
                <div class="col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>{{ $sport->sport_name }}</strong></li>
                        <li class="list-group-item">Role: {{ $sport->role }}</li>
                        <li class="list-group-item">Start Date: {{ $sport->activity->start_date }}</li>
                        <li class="list-group-item">End Date: @if($sport->activity->end_date == 1) Present @else {{ $sport->activity->end_date }} @endif</li>
                        <li class="list-group-item">Effort: {{ $sport->activity->effort }}</li>
                        <li class="list-group-item">Description: {{ $sport->activity->description }}</li>
                        <li class="list-group-item">Image: @if($sport->activity->image) {{ $sport->activity->image }} @else No Image @endif</li>
                    </ul>
                </div>
        @endforeach
        </div>

        <br>
        <h3>Organizations/Societies</h3>
        <div class="row">
        @foreach($organizations as $organization)
                <div class="col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item"><strong>{{ $organization->org_name }}</strong></li>
                        <li class="list-group-item">Project: {{ $organization->project_name }}</li>
                        <li class="list-group-item">Role: {{ $organization->role }}</li>
                        <li class="list-group-item">Start Date: {{ $organization->activity->start_date }}</li>
                        <li class="list-group-item">End Date: @if(@$organization->activity->end_date == 1) Present @else {{ $organization->activity->end_date }} @endif</li>
                    </ul>
                </div>
        @endforeach
        </div>
    </div>
@stop

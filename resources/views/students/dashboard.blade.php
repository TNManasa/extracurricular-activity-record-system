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
                        <li class="list-group-item">End Date: @if($sport->activity->end_date == 1)
                                Present @else {{ $sport->activity->end_date }} @endif</li>
                        <li class="list-group-item">Effort: {{ $sport->activity->effort }}</li>
                        <li class="list-group-item">Description: {{ $sport->activity->description }}</li>
                        <li class="list-group-item">
                            Image: @if($sport->activity->image) <img src="{{route('activities.get-image',['activity_id'=>$sport->activity->id])}}" style="width: 200px;height: 200px"> @else No Image @endif</li>
                        <li class="list-group-item">
                            Validation:
                            @if($sport->activity->validation == null)
                                Pending
                            @else
                                @if($sport->activity->validation->is_validated == 1)
                                    Validated
                                @elseif($sport->activity->validation->is_validated==2)
                                    Rejected
                                @endif
                            @endif
                        </li>
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
                        <li class="list-group-item"><strong>{{ $organization->org_name }}&nbsp;&nbsp;<img src="{{route('organizations.get-logo',['logo_name'=>$organization->org_name])}}" style="width: 40px; height: 40px"></strong></li>
                        <li class="list-group-item">Project: {{ $organization->project_name }}</li>
                        <li class="list-group-item">Role: {{ $organization->role }}</li>
                        <li class="list-group-item">Start Date: {{ $organization->activity->start_date }}</li>
                        <li class="list-group-item">End Date: @if(@$organization->activity->end_date == 1)
                                Present @else {{ $organization->activity->end_date }} @endif</li>
                        <li class="list-group-item">Effort: {{ $organization->activity->effort }}</li>
                        <li class="list-group-item">Description: {{ $organization->activity->description }}</li>
                        <li class="list-group-item">
                            Image: @if($organization->activity->image) <img src="{{route('activities.get-image',['activity_id'=>$organization->activity->id])}}" style="width: 200px;height: 200px"> @else No Image @endif</li>
                        <li class="list-group-item">
                            Validation:
                            @if($organization->activity->validation == null)
                                Pending
                            @else
                                @if($organization->activity->validation->is_validated == 1)
                                    Validated
                                @elseif($organization->activity->validation->is_validated==2)
                                    Rejected
                                @endif
                            @endif
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
        
        <h3>Achievements</h3>
        <div class="row">
            @foreach($achievements as $achievement)
                <div class="col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item">Achievement: {{ $achievement->achievement_name }}</li>
                        <li class="list-group-item">Start Date: {{ $achievement->activity->start_date }}</li>
                        <li class="list-group-item">End Date: @if(@$achievement->activity->end_date == 1)
                                Present @else {{ $achievement->activity->end_date }} @endif</li>
                        <li class="list-group-item">Effort: {{ $achievement->activity->effort }}</li>
                        <li class="list-group-item">Description: {{ $achievement->activity->description }}</li>
                        <li class="list-group-item">
                            Image: @if($achievement->activity->image) <img src="{{route('activities.get-image',['activity_id'=>$achievement->activity->id])}}" style="width: 200px;height: 200px"> @else No Image @endif</li>
                        <li class="list-group-item">
                            Validation:
                            @if($achievement->activity->validation == null)
                                Pending
                            @else
                                @if($achievement->activity->validation->is_validated == 1)
                                    Validated
                                @elseif($achievement->activity->validation->is_validated==2)
                                    Rejected
                                @endif
                            @endif
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>

        <h3>Competitions</h3>
        <div class="row">
            @foreach($competitions as $competition)
                <div class="col-md-4">
                    <ul class="list-group">
                        <li class="list-group-item">{{ $competition->competition_name }}</li>
                        <li class="list-group-item">Status: {{ $competition->status }}</li>
                        
                        <li class="list-group-item">Start Date: {{ $competition->activity->start_date }}</li>
                        <li class="list-group-item">End Date: @if(@$competition->activity->end_date == 1)
                                Present @else {{ $competition->activity->end_date }} @endif</li>
                        <li class="list-group-item">Effort: {{ $competition->activity->effort }}</li>
                        <li class="list-group-item">Description: {{ $competition->activity->description }}</li>
                        <li class="list-group-item">
                            Image: @if($competition->activity->image)<img src="{{route('activities.get-image',['activity_id'=>$competition->activity->id])}}" style="width: 200px;height: 200px">@else No Image @endif</li>
                        <li class="list-group-item">
                            Validation:
                            @if($competition->activity->validation == null)
                                Pending
                            @else
                                @if($competition->activity->validation->is_validated == 1)
                                    Validated
                                @elseif($competition->activity->validation->is_validated==2)
                                    Rejected
                                @endif
                            @endif
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
@stop

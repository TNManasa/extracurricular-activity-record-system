{{-- This view is for the use of admin only--}}
@extends('layouts.master')

@section('title')
    Student Profile of Index No: {{ $student->index_no }} | ECAM
    {{-- This view is for the use of admin only--}}
@stop

@section('content')
    {{-- This view is for the use of admin only--}}
    <div class="row">
        <a href="{{ route('admin.all-students') }}" class="btn btn-default">Back</a>
    </div>
    <div class="row">
        <div class="col-md-10">
            <br>
            <hr>
            <div class="panel panel-{{ $student->flag ? 'danger' : 'info' }}">
                <div class="panel-heading">
                    <h2>{{ $student->first_name }} {{ $student->last_name }}</h2>
                    @if($student->flag)
                        <h5>Flagged User</h5>
                        <a href="{{ route('admin.flag-user', [$student->user_id]) }}" class="btn btn-warning">
                            Unflag
                        </a>
                    @else
                        <a href="{{ route('admin.flag-user', [$student->user_id]) }}" class="btn btn-danger">
                            Flag
                        </a>
                    @endif
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item">Index No: {{ $student->index_no }}</li>
                                <li class="list-group-item">First Name: {{ $student->first_name }}</li>
                                <li class="list-group-item">Last Name: {{ $student->last_name }}</li>
                                <li class="list-group-item">Gender:
                                    @if($student->gender == 1)
                                        Male
                                    @elseif($student->gender ==2)
                                        Female
                                    @endif
                                </li>

                                <li class="list-group-item">Email: {{ $student->email }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>{{--End of Panel--}}
        </div> {{--End of Column--}}
    </div>{{--End of Row--}}

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h3>Student's Activities</h3>
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
                            Image: @if($sport->activity->image) {{ $sport->activity->image }} @else No Image @endif</li>
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
                        <li class="list-group-item"><strong>{{ $organization->org_name }}</strong></li>
                        <li class="list-group-item">Project: {{ $organization->project_name }}</li>
                        <li class="list-group-item">Role: {{ $organization->role }}</li>
                        <li class="list-group-item">Start Date: {{ $organization->activity->start_date }}</li>
                        <li class="list-group-item">End Date: @if(@$organization->activity->end_date == 1)
                                Present @else {{ $organization->activity->end_date }} @endif</li>
                        <li class="list-group-item">Effort: {{ $organization->activity->effort }}</li>
                        <li class="list-group-item">Description: {{ $organization->activity->description }}</li>
                        <li class="list-group-item">
                            Image: @if($organization->activity->image) {{ $organization->activity->image }} @else No Image @endif</li>
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
                            Image: @if($achievement->activity->image) {{ $achievement->activity->image }} @else No Image @endif</li>
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
                            Image: @if($competition->activity->image) {{ $competition->activity->image }} @else No Image @endif</li>
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


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
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Sports</h4>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($sports as $sport)
                            <li class="list-group-item">{{ $sport->sport_name }}</li>
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
                    <h4>Organizations/Societies</h4>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach($organizations as $organization)
                            <li class="list-group-item">{{ $organization->org_name }}</li>
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
                    <h4>Achievements</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-responsive">

                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Competitions</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-responsive">

                    </table>
                </div>
            </div>
        </div>
    </div>
@stop


@extends('layouts.master')

@section('title')
    Student Profile of Index No: {{ $student->index_no }} | ECAM
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            <a href="{{ route('admin.all-students') }}" class="btn btn-default">Back</a>
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
            </div>
        </div>
    </div>
@stop

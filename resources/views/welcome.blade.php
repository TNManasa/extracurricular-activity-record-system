@extends('layouts.master')

@section('title')
    Welcome to ECAM
@stop

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1>Welcome!</h1>
            <h3>Students' Extra Curricular Activity Management System</h3>
            <h4>University of Moratuwa - Department of Computer Science & Engineering</h4>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6 ol-md-offset-2">
            <a href="{{ route('students.register') }}" class="btn btn-default">Student Sign Up</a>
            <a href="{{ route('sports.index') }}" class="btn btn-default">Sports</a>
            <a href="{{ route('organizations.index') }}" class="btn btn-default">Societies/Organizations</a>
            <a href="{{ route('competitions.index') }}" class="btn btn-default">Competitions</a>
            <a href="{{ route('activities.new-activity') }}" class="btn btn-default">New Activity</a>
        </div>
    </div>
@stop
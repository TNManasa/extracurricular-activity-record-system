@extends('layouts.master')

@section('title')
    Supervisor Dash Board
@stop

@section('begin_body')
    <div class="container">
        <div class="jumbotron">
            <h1>Activity Monitoring</h1>
            <h3>Students' Extra Curricular Activity Management System</h3>
            <h4>University of Moratuwa - Department of Computer Science & Engineering</h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row"-2>
        <div class="col-md-4">
            <a href="{{ route('students.register') }}" class="btn btn-primary">Pending Activities</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('students.register') }}" class="btn btn-primary">Validated Activities</a>
        </div>
    </div>
@stop
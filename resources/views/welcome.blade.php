@extends('layouts.master')

@section('title')
    Welcome to ECAM
@stop

@section('begin_body')
    <div class="container">
        <div class="jumbotron">
            <h1>Welcome!</h1>
            <h3>Students' Extra Curricular Activity Management System</h3>
            <h4>University of Moratuwa - Department of Computer Science & Engineering</h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 ol-md-offset-2">
            <a href="{{ route('') }}" class="btn btn-default">Student Sign Up</a>
        </div>
    </div>
@stop
@extends('layouts.master')

@section('title')
    Sign Up | Student | ECAM
@stop

@section('content')
    {{--Student Sign Up Form--}}
    <div class="row">
        <div class="col-md-4">
            <form action="{{ route('student.addDetails') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="index_no">Index No: </label>
                    <input type="text" name="index_no" class="form-control">
                </div>

                <div class="form-group">
                    <label for="first_name">First Name: </label>
                    <input type="text" name="first_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="last_name">Last Name: </label>
                    <input type="text" name="last_name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="text" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" class="form-control">
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="number" name="gender" class="form-control">
                </div>

                <div class="form-group">
                    <label for="faculty">Department</label>
                    <input type="text" name="faculty" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" name="password" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password: </label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-lg">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
@stop

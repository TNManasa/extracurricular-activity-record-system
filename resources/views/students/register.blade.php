@extends('layouts.master')

@section('title')
    Sign Up | Student | ECAM
@stop

@section('content')
    {{--Student Sign Up Form--}}

    <div class="row">
        <div class="col-md-6-offset-2">
            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif

        </div>
    </div>
    <div class="row">
        <div class="col-md-6-offset-2">
            @if (isset($customMessage))
                <h2> {{$customMessage}}</h2>
            @endif
        </div>
    </div>
    <div class="row">
        <h1>Register as Student</h1>
        <br>
        <form action="{{ route('student.addDetails') }}" method="post">
            {{ csrf_field() }}
            <div class="col-md-4">
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

            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="text" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" name="dob" class="form-control">
                </div>

                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <select name="gender" class="form-control">
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="batch">Batch:</label>
                    <input type="number" name="batch" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password: </label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <div class="form-group">
                    <input type="hidden" name="role" value="student">
                </div>
            </div>

            <div class="col-md-6 col-md-offset-3">
                <div class="form-group">
                    <br><br>
                    <button type="submit" class="btn btn-info btn-lg btn-block">Sign Up</button>
                </div>
            </div>
        </form>
    </div>
@stop

@extends('layouts.master')

@section('title')
    New Supervisor | ECAM
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h3>New Supervisor</h3>
            <form action="" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="emp_id">Employee ID</label>
                    <input type="text" class="form-control" name="emp_id">
                </div>
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" class="form-control" name="first_name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" name="last_name">
                </div>
                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" class="form-control" name="position">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input type="text" class="form-control" name="confirm_password">
                </div>
                <button class="btn btn-default" type="submit">Submit</button>
            </form>
        </div>
    </div>
@stop

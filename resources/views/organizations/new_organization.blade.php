@extends('layouts.master')

@section('title')
    Student | New Activity | Organization/Society
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2>New Activity (Organization/Society)</h2>
            <form action="" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name of the Society/Organization</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" class="form-control" name="position">
                </div>

                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" class="form-control" name="start_date">
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@stop

@extends('layouts.master')

@section('title')
    Student | New Activity | Competition
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2>Add New Activity (Competitions)</h2>
            <form action="" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="achievements">Achievements</label>
                    <input type="text" name="achievements" class="form-control">
                </div>

                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" class="form-control">
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@stop

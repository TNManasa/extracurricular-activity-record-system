@extends('layouts.master')

@section('title')
    Student | New Activity | Achievement
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2>Add New Activity (Achievement)</h2>
            <form action="{{ route('achievements.add-new-achievement') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Achievement Name:</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <label>Time Duration or No Time Duration:</label>
                <br>
                <div class="row">
                    <div class="form-group" style="padding-left: 30px">
                        <label for="start_date" style="font-size: 13px">Start Date:</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="date" name="start_date" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label style="font-size: 13px; font-weight: bold"><input type="checkbox" value="1" name="no_time">No Time Duration</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group" style="padding-left: 30px">
                        <label for="end_date" style="font-size: 13px">End Date or Present:</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="end_date">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkbox">
                                    <label><input type="checkbox" value="1" name="end_date">Present</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="effort">Effort in hours (weekly/daily):</label>
                    <input type="number" class="form-control" name="effort">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" rows="5" name="description"></textarea>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@stop
@extends('layouts.master')

@section('title')
    Student | New Activity | Competition
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2>Add New Activity (Competitions)</h2>
            <form action="{{route('competitions.add-new-competition-activity')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Competition Name:</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="status">Status: (Winner/1st Runner-up/2nd Runner-up/Participation etc)</label>
                    <input type="text" name="status" class="form-control">
                </div>

                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" name="start_date" class="form-control">
                </div>

                <div class="form-group">
                    <label for="end_date">End Date or Present:</label>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="date" class="form-control" name="end_date">
                        </div>
                        <div class="col-md-6">
                            <div class="checkbox">
                                <label><input type="checkbox" value="1" name="end_date">Present</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="effort">Effort in hours (daily/weekly):</label>
                    <input type="number" class="form-control" name="effort">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" rows="5" name="description"></textarea>
                </div>

                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@stop

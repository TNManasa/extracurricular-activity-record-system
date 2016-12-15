@extends('layouts.master')

@section('title')
    Add Activity | ECAM
@stop

@section('content')
    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-6">
            <h2>Add New Activity</h2>
            <form action="{{ route('activities.continue') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="type">Type: </label>
                    <select name="type" class="form-control">
                        <option value="sport">Sport</option>
                        <option value="organization">Society/Organization</option>
                        <option value="competition">Competition</option>
                        <option value="achievement">Achievement</option>
                    </select>
                </div>
                {{--<div class="form-group">--}}
                    {{--<label for="start_date">Start Date: </label>--}}
                    {{--<input type="date" name="start_date" class="form-control">--}}
                {{--</div>--}}
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Continue</button>
                </div>
            </form>
        </div>
    </div>
@stop

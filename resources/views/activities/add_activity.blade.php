@extends('layouts.master')

@section('title')
    Add Activity | ECAM
@stop

@section('content')
    <div class="row">
        <div class="col-md-4">
            <h2>Add New Activity</h2>
            <form action="" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="type">Type: </label>
                    <select class="form-control">
                        <option value="volvo">Sport</option>
                        <option value="saab">Society</option>
                        <option value="opel">Competition</option>
                        <option value="other">Other</option>
                    </select>
                </div>
            </form>
        </div>
    </div>
@stop


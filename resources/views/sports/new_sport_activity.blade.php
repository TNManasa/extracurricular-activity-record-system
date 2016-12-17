@extends('layouts.master')

@section('title')
    Student | New Activity | Sport
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2>Add New Activity (Sport)</h2>
            <form action="{{ route('sports.add-new-sport-activity') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name of the Sport:</label>
                    <select name="name" class="form-control">
                        @foreach($all_sports as $sport)
                            <option value="{{$sport->id}}">{{$sport->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="role">Position/Role:</label>
                    <input type="text" name="role" class="form-control">
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
                    <label for="effort">Effort in weekly hours:</label>
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

@extends('layouts.master')

@section('title')
    Student | New Activity | Organization/Society
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2>New Activity (Organization/Society)</h2>
            <form action="{{route('organizations.add-new-organization-activity')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name of the Society/Organization:</label>
                    <select name="name" class="form-control">
                        @foreach($all_organizations as $organization)
                            <option value="{{$organization->id}}">{{$organization->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="role">Position/Role:</label>
                    <input type="text" class="form-control" name="role">
                </div>

                <div class="form-group">
                    <label for="project_name">Project Name:</label>
                    <input type="text" class="form-control" name="project_name">
                </div>

                <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="date" class="form-control" name="start_date">
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

@extends('layouts.master')

@section('title')
    All Supervisors | Admin | ECAM
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h2>All Supervisors</h2>
            <table class="table table-bordered">
                <tr>
                    <th>Employee ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Position</th>
                    <th>Email</th>
                </tr>
                    @foreach($supervisors as $supervisor)
                       <tr>
                           <td>{{ $supervisor->emp_id }}</td>
                           <td>{{ $supervisor->first_name }}</td>
                           <td>{{ $supervisor->last_name }}</td>
                           <td>{{ $supervisor->position }}</td>
                           <td>{{ $supervisor->email }}</td>
                       </tr>
                    @endforeach
            </table>
        </div>
        <a href="{{ route('admin.index') }}" class="btn btn-info">Back</a>
    </div>
@stop

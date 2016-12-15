@extends('layouts.master')

@section('title')
    All Students | ECAM
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2>Students</h2>
            <table class="table table-hover">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Index No</th>
                    <th>Faculty</th>
                </tr>
                @foreach($students as $student)
                <tr>
                    <td>{{$student->first_name}}</td>
                    <td>{{$student->last_name }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
@stop

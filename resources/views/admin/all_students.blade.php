@extends('layouts.master')

@section('title')
    All Students | ECAM
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            <h2>Students</h2>
            <table class="table table-bordered">
                <tr>
                    <th>Index No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>DoB</th>
                    <th>Batch</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->index_no }}</td>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $student->last_name  }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->dob }}</td>
                    <td>{{ $student->batch }}</td>
                    <td>{{ $student->email}}</td>
                    <td>
                        <div>
                            {{--See More Button--}}
                            <a href="{{ route('admin.student-profile',[$student->index_no]) }}" class="btn btn-xs btn-default">See More</a>

                            {{--Flag/Unflag Button--}}
                            @if($student->flag == 0)
                                <a href="{{ route('admin.flag-user', $student->user_id) }}" class="btn btn-xs btn-danger">Flag</a>
                            @elseif($student->flag == 1)
                                <a href="{{ route('admin.flag-user', $student->user_id) }}" class="btn btn-xs btn-warning">Un-flag</a>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <a href="{{ route('admin.index') }}" class="btn btn-info">Back</a>
    </div>
@stop

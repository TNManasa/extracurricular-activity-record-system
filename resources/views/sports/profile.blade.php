@extends('layouts.master')

@section('title')
    {{ $sport->name }} | Profile | ECAM
@stop

@section('content')
    <div class="row">
        <div><h3 class="title" style="text-align: center">{{ $sport->name }}</h3></div>
        <div class="col-md-6">
            <h4>Students who participate in  <strong>{{ $sport->name }}</strong></h4>
            <div>
                <table class="table table-bordered">
                    @if($students)
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
                    @else
                        <h5>No students</h5>
                    @endif
                </table>
            </div>
        </div>
    </div>
@stop


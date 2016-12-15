@extends('layouts.master')

@section('title')
    Supervisor Dash Board
@stop

@section('begin_body')
    <div class="container">
        <div class="jumbotron">
            <h1>Activities to be validated</h1>
            <h3>Students' Extra Curricular Activity Management System</h3>
            <h4>University of Moratuwa - Department of Computer Science & Engineering</h4>
        </div>
    </div>
    <table class="table">
        <thead>
        <tr>

            <th>Student_ID</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Type </th>
            <th></th>

        </tr>
        </thead>
        <tbody>
        @foreach($activities as $a)

            @if($a->type==1)
                <?php $b="sports activity"?>
            @elseif($a->type==2)
                <?php $b="organizational activity"?>
            @elseif($a->type==3)
                <?php $b="competition"?>
            @elseif($a->type==4)
                <?php $b="achievements"?>
            @endif


        <tr>

            <td>{{$a->student_id}}</td>
            <td>{{$a->start_date}}</td>
            <td>{{$a->end_date}}</td>
            <td>{{$b}}</td>
            <td><a href="/activity/{{$a->id}}" class="btn-primary"  >View Activity </a></td>

        </tr>
        @endforeach
        </tbody>
    </table>











@stop



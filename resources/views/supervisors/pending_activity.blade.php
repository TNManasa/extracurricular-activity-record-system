@extends('layouts.master')

@section('title')
    Supervisor Dash Board
@stop

@section('begin_body')

    <div class="col-md-offset-2">
        <a href="/supervisor" class="btn btn-primary">Back</a>
    </div>


    <div class="col-md-offset-3">
    <div class="container">
        <div class="col-md-10">
        <div class="jumbotron">
            <h1>Activities to be validated</h1>
            <h3>Students' Extra Curricular Activity Management System</h3>
            <h4>University of Moratuwa - Department of Computer Science & Engineering</h4>
        </div>
            </div>
    </div>

        <?php $ed="present"?>

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
        @foreach($pendingActivities as $a)

            @if(!($a->end_date==1))
            <?php $ed=$a->end_date ?>
            @endif

            @if($a->activity_type==1)
                <?php $b="Organizational Activity"?>
            @elseif($a->activity_type==2)
                <?php $b="Sports Activity"?>
            @elseif($a->activity_type==3)
                <?php $b="Competition"?>
            @elseif($a->activity_type==4)
                <?php $b="Achievements"?>
            @endif
            <?php $id=$a->id?>

        <tr>

            <td>{{$a->student_id}}</td>
            <td>{{$a->start_date}}</td>
            <td>{{$ed}}</td>
            <td>{{$b}}</td>
            <td><a href="/pending_activity/{{$id}}" class=" btn btn-primary"  >View Activity </a></td>

        </tr>
        @endforeach
        </tbody>
    </table>
    </div>











@stop



@extends('layouts.master')







@section('title')
    activity to be validated

@stop

@section('content')




    <div class="container">
        <div class="col-md-10">
            <div class="jumbotron">
                <h1>Role: {{$a[0]->role}}</h1>
                <h3>Project Name: {{$a[0]->institute_name}}</h3>
                <h4>University of Moratuwa </h4>
            </div>
        </div>
    </div>





    {{-- @foreach($activity as $a)--}}
    @if($a[0]->activity_type==1)
        <?php $b = "Organizational Activity"?>
    @elseif($a[0]->activity_type==2)
        <?php $b = "Sports Activity"?>
    @elseif($a[0]->activity_type==3)
        <?php $b = "Competition"?>
    @elseif($a[0]->activity_type==4)
        <?php $b = "Achievements"?>
    @endif
    <?php $id = $a[0]->id ?>
    <ul class="list-group">
        <li class="list-group-item">Student ID : {{$a[0]->student_id}} </li>
        <li class="list-group-item">Student Name : {{$a[0]->s_first_name}}  {{$a[0]->s_last_name}} </li>
        <li class="list-group-item">Activity Type: {{$b}}</li>
        <li class="list-group-item">Description: <h4>{{$a[0]->description}} </h4> </li>
        <li class="list-group-item">
            Duration:
            <h4>From {{$a[0]->start_date}} To {{$a[0]->end_date}} </h4>
        </li>

        <li class="list-group-item">
    </ul>

    <br>
    <br>
    {{--@endforeach--}}







@stop
@extends('layouts.master')

@section('title')
    Activity
@stop

@section('begin_body')
    <div class="container">
        <div class="jumbotron">
            <h1>Activity Monitoring</h1>
            <h3>Students' Extra Curricular Activity Management System</h3>
            <h4>University of Moratuwa - Department of Computer Science & Engineering</h4>
        </div>
    </div>


@stop

@section('content')
    @foreach($activity as $a)
        @if($a->type==1)
            <?php $b="Sports Activity"?>
        @elseif($a->type==2)
            <?php $b="Organizational Activity"?>
        @elseif($a->type==3)
            <?php $b="Competition"?>
        @elseif($a->type==4)
            <?php $b="Achievements"?>
        @endif
        <div class="row"><h3>Student ID : {{$a->id}} </h3></div>
        <div class="row"><h3>Activity Type:  {{$b}}</h3></div>
        <div class="row"><h3>Description </h3></div>
        <div class="row"><h4>{{$a->description}} </h4></div>
        <div class="row">
            <br>
            <br>
        <div class="row">
            <div class="col-md-4"><h4>Duration  : </h4></div>
            <div class="col-md-2"><h4>From </h4></div>
            <div class="col-md-2"><h4>{{$a->start_date}}  </h4></div>
            <div class="col-md-2"><h4>To </h4></div>
            <div class="col-md-2"><h4>{{$a->end_date}} </h4></div>
        </div>



    @endforeach

@stop
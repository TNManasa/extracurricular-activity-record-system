@extends('layouts.master')

@section('title')
    Activity to be validated

@stop

@section('content')
    <a href="/pending" class="btn btn-primary">Back</a>

    <div class="container">
        <div class="col-md-10">
            <div class="jumbotron">
                <h1> {{$a->role}}</h1>
                <h3> {{$a->institute_name}}</h3>
                <h4>University of Moratuwa </h4>
            </div>
        </div>
    </div>

    <?php $ed = "Present"?>
    {{-- @foreach($activity as $a)--}}

    @if(!($a->end_date==1)){
    {{$ed=$a->end_date}}
    }@endif


    @if($a->activity_type==1)
        <?php $b = "Organizational Activity"?>
    @elseif($a->activity_type==2)
        <?php $b = "Sports Activity"?>
    @elseif($a->activity_type==3)
        <?php $b = "Competition"?>
    @elseif($a->activity_type==4)
        <?php $b = "Achievements"?>
    @endif
    <?php $id = $a->id ?>
    <ul class="list-group">
        <li class="list-group-item">Student ID : {{$a->student_id}} </li>
        <li class="list-group-item">Student Name : {{$a->s_first_name}}  {{$a->s_last_name}} </li>
        <li class="list-group-item">Activity Type: {{$b}}</li>
        <li class="list-group-item">Description: <h4>{{$a->description}} </h4></li>
        <li class="list-group-item">
            Duration:
            <h4>From {{$a->start_date}} To {{$ed}} </h4>
        </li>

    </ul>

    <br>
    <br>
    {{--@endforeach--}}
    @if($a->image==1)
        <div class="image">
            <img src="{{route('activities.get-image',['activity_id'=>$a->id])}}">
        </div>
    @endif


    <form method="post" action="{{$a->id}}/reject">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Reject The Activity </h3>
            </div>
            <div class="panel-body">
                <h3>Reason for rejection </h3>
            </div>
            <div class="input">
                <input class="form-control" type="text" name="r_description">
            </div>
            <div>
                <br>
                <button type="submit" class="btn btn-success" name="reject"
                        onclick='return confirm("Do you really want to reject this activity ?");'>Reject
                </button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
            </div>
        </div>


    </form>
    <form method="post" action="{{$a->id}}/validate">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Validate the Activity </h3>
            </div>
            <div class="panel-body">
                <h3>Comments on Activity </h3>
            </div>
            <br>
            <div class="input">
                <input class="form-control" type="text" name="v_description">
            </div>
        </div>



        <div class="well well-sm well-primary">
            <br>
            <h3>Rate the effort </h3>
            </br>

        </div>


        <div class="btn-group btn-group-vertical" data-toggle="buttons">
            <div class="radio">
                <label>
                    <input type="radio" name="option" value="1">Very Low Effort</span>
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="option" value="2"> Low Effort</span>
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="option" value="3"> Medium Effort</span>
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="option" value="4"> High Effort</span>
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="option" value="5"> Excellent Effort </span>
                </label>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-success" name="submit">Validate</button>
            <input type="hidden" name="_token" value="{{ Session::token() }}">
        </div>
    </form>





@stop
@extends('layouts.master')







@section('title')
    activity to be validated

@stop

@section('content')




    <div class="container">
        <div class="col-md-10">
            <div class="jumbotron">
                <h1>Role: {{$a->role}}</h1>
                <h3>Project Name: {{$a->institute_name}}</h3>
                <h4>University of Moratuwa </h4>
            </div>
        </div>
    </div>





    {{-- @foreach($activity as $a)--}}
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
        <li class="list-group-item">Description: <h4>{{$a->description}} </h4> </li>
        <li class="list-group-item">
            Duration:
            <h4>From {{$a->start_date}} To {{$a->end_date}} </h4>
        </li>

    </ul>

    <br>
    <br>
    {{--@endforeach--}}

    <form method="post" action="{{$id}}/validate">

        <div class="well well-sm well-primary">
            <br>
            <h3>Add a note </h3>
            </br>

        </div>

        <div class="input">
            <input type="text" name="v_description">
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
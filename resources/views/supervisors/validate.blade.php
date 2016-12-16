@extends('layouts.master')







@section('title')
    Activity

@stop

@section('begin_body')



    <div class="col-md-offset-3">
        <div class="container">
            <div class="col-md-10">
                <div class="jumbotron">
                    <h1>Activity</h1>
                    <h3>Students' Extra Curricular Activity Management System</h3>
                    <h4>University of Moratuwa - Department of Computer Science & Engineering</h4>
                </div>
            </div>
        </div>





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
        <?php $id=$a->id ?>
        <div class="row"><h3>Student ID : {{$a->id}} </h3></div>
        <div class="row"><h3>Activity Type:  {{$b}}</h3></div>
        <div class="row"><h3>Description </h3></div>
        <div class="row"><h4>{{$a->description}} </h4></div>

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



            <form method="post" action="{{$id}}/validate">
                <div class="well well-sm well-primary">
                    <br>
                    <h3>Rate the effort </h3>
                    </br>

                </div>
                <div class="btn-group btn-group-vertical" data-toggle="buttons">
                    <div class="radio">
                    <label >
                        <input type="radio" name="option" value= "1">Very Low Effort</span>
                    </label>
                     </div>
                    <div class="radio">
                    <label>
                        <input type="radio" name="option" value="2"> Low Effort</span>
                    </label>
                    </div>
                    <div class="radio">
                    <label >
                        <input type="radio" name="option" value="3"> Medium Effort</span>
                    </label>
                    </div>
                    <div class="radio">
                    <label >
                        <input type="radio" name="option" value="4"> High Effort</span>
                    </label>
                    </div>
                    <div class="radio">
                    <label >
                        <input type="radio" name="option" value="5"> Excellent Effort </span>
                    </label>
                    </div>
                </div>
                <div>
                <button type="submit" class="btn btn-success" name="submit">Validate</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                </div>
            </form>


</div>



@stop
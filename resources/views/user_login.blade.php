@extends('layouts.master')

@section('title')
    User Login
@stop

@section('begin_body')
    <div class="container">
        <div class="jumbotron">
            <h1>Login!</h1>
            <h3>Students' Extra Curricular Activity Management System</h3>
            <h4>University of Moratuwa - Department of Computer Science & Engineering</h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6-offset-2">
            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif

        </div>
    </div>
    <div class="row">
        <div class="col-md-6-offset-2">

            @if (isset($customMessage))
                <h2> {{$customMessage}}</h2>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 ol-md-offset-2">



            <form action="{{ route('userLogin') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="text" name="email" class="form-control">
                </div>



                <div class="form-group">
                    <label for="password">Password: </label>
                    <input type="password" name="password" class="form-control" >
                </div>


                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-lg">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
@stop
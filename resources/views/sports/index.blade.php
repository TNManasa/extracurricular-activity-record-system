@extends('layouts.master')

@section('title')
    Sports | ECAM
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h3>All Sports</h3>
            <ul class="list-group">
                @foreach($all_sports as $sport)
                    <li class="list-group-item"><a href="">{{ $sport->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@stop

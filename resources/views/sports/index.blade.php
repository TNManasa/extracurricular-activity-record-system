@extends('layouts.master')

@section('title')
    All Sports | ECAM
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <ul class="list-group">
                @foreach($all_sports as $sport)
                    <li class="list-group-item">{{ $sport->title }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@stop

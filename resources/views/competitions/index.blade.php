@extends('layouts.master')

@section('title')
    Competitions | ECAM
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2>All Competitions</h2>
            <ul class="list-group">
                @foreach($all_competitions as $competition)
                    <li class="list-group-item">{{ $competition->title }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h2>Raw Competitions</h2>
            <ul class="list-group">
                @foreach($raw_competitions as $competition)
                    <li class="list-group-item">{{ $competition->title }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@stop

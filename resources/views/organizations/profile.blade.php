@extends('layouts.master')

@section('title')
    {{ $organization->name }} | Profile | ECAM
@stop

@section('content')
    <div class="row">
        <div><h3 class="title" style="text-align: center">{{ $organization->name }}</h3></div>
        <div class="col-md-6">
            <h4>Students who participate in <strong>{{ $organization->name }}</strong></h4>
        </div>
    </div>
@stop


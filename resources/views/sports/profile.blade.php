@extends('layouts.master')

@section('title')
    {{ $sport->name }} | Profile | ECAM
@stop

@section('content')
    <div class="row">
        <div><h3 class="title" style="text-align: center">{{ $sport->name }}</h3></div>
        <div class="col-md-6">
            <h4>Students who participate in  <strong>{{ $sport->name }}</strong></h4>
        </div>
    </div>
@stop


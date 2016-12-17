@extends('layouts.master')

@section('title')
    Societies | ECAM
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <h2>All Societies</h2>
            <ul class="list-group">
                @foreach($all_organizations as $organization)
                    <li class="list-group-item"><a href="">{{ $organization->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@stop
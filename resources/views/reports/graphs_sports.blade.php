@extends('layouts.master')

@section('title')
    Bar Charts | Sports | Admin | ECAM
@stop

@section('content')
    <div id="chart_div"></div>
    // With Lava class alias
    <?= Lava::render('DonutChart', 'IMDB', 'chart-div') ?>
@stop
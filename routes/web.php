<?php


Route::get('/', function () {
    return view('welcome');
});
/*
 * Convention for naming the routes: use lowercase and periods, Use Plurals
 * Convention for naming Controller methods: Use camelCase
 * */


// Student Routes
Route::get('/students/register', [
    'uses' => 'StudentsController@getIndex',
    'as' => 'students.register'
]);

// End of Student Routes

Route::get('/sports', [
    'uses' => 'SportsController@getIndex',
    'as' => 'sports.index'
]);

Route::get('/societies', [
    'uses' => 'SocietiesController@getIndex',
    'as' => 'societies.index'
]);

Route::get('/competitions', [
    'uses' => 'CompetitionsController@getIndex',
    'as' => 'competitions.index'
]);

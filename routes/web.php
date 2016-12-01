<?php


Route::get('/', function () {
    return view('welcome');
});
/*
 * Convention for naming the routes: use lowercase letters, hiphens, periods, Use Plurals
 * Convention for naming Controller methods: Use camelCase
 * */


// Student Routes
Route::get('/students/register', [
    'uses' => 'StudentsController@getIndex',
    'as' => 'students.register'
]);

// End of Student Routes

Route::get('/sports', [
    // view all sports
    'uses' => 'SportsController@getIndex',
    'as' => 'sports.index'
]);

Route::get('/new-sport', [
    // add new sport form
    'uses' => 'SportsController@newSport',
    'as' => 'sports.new-sport'
]);

Route::post('/add-new-sport', [
    // actually add new sport
    'uses' => 'SportsController@addNewSport',
    'as' => 'sports.add-new-sport'
]);

Route::get('/societies', [
    // view all societies
    'uses' => 'SocietiesController@getIndex',
    'as' => 'societies.index'
]);

Route::get('/new-society', [
    // add new society form
    'uses' => 'SocietiesController@newSociety',
    'as' => 'societies.new-society'
]);

Route::post('/add-new-society', [
    // actually add new society
   'uses' => 'SocietiesController@addNewSociety',
    'as' => 'societies.add-new-society'
]);

Route::get('/competitions', [
    // view all competitions
    'uses' => 'CompetitionsController@getIndex',
    'as' => 'competitions.index'
]);

Route::get('/new-competition', [
    // add new competition form
    'uses' => 'CompetitionsController@newCompetition',
    'as' => 'competitions.new-competition'
]);

Route::post('/add-new-competition', [
    // actually add new competition
    'uses' => 'CompetitionController@addNewCompetition',
    'as' => 'competitions.add-new-competition'
]);

Route::get('new_activity', [
    'uses' => 'ActivitiesController@getNewActivityForm',
    'as' => 'activities.new_activity'
]);


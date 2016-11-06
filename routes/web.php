<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*
 * Convention for naming the routes: use lowercase and underscores, Use Plurals
 * Convention for naming Controller methods: Use camelCase
 * */


// Student Routes
Route::get('/students/register', [
    'uses' => 'StudentsController@getIndex',
    'as' => 'students_register'
]);

// End of Student Routes

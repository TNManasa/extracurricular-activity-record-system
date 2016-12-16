<?php


Route::get('/', function () {
    return view('welcome');
})->name('welcome');
/*
 * Convention for naming the routes: use lowercase letters, hyphens, periods, Use Plurals
 * Convention for naming Controller methods: Use camelCase
 * */

// Dashboards

Route::get('admin/dashboard', [
    'uses' => 'AdminController@getDashboard',
    'as' => 'admin.dashboard',
]);

Route::get('student/dashboard', [
    'uses' => 'StudentsController@getDashboard',
    'as' => 'students.dashboard'
]);

Route::get('supervisor/dashboard', [
    'uses' => 'SupervisorsController@getDashboard',
    'as' => 'supervisors.dashboard'
]);


//user Login
Route::get('/login',function(){
    return view('user_login');
});

Route::post('/loginDetails',[
    'uses' => 'UsersController@loginUser',
    'as' => 'userLogin'
]);



// Student Routes
//Route::get('students/all', [
//    'uses' => 'StudentsController@getAllStudents',
//    'as' => 'students.all'
//])->middleware('auth','checkStudent');

Route::get('/students/register', [
    // add new student form
    'uses' => 'StudentsController@newStudent',
    'as' => 'students.register'
]);

Route::post('/students/addDetails',[
    // actually add new student
    'uses' => 'StudentsController@addNewStudent',
    'as' => 'student.addDetails'
]);

// End of Student Routes

// Supervisor Routes

Route::get('/supervisors/register', [
    'uses' => 'SupervisorsController@newSupervisor',
    'as' => 'supervisors.register'
]);

Route::get('/supervisors/addDetails', [
    'uses' => 'SupervisorsController@addNewSupervisor',
    'as' => 'supervisor.addDetails'
]);
// End of Supervisor Routes
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

Route::get('/organizations', [
    // view all organizations
    'uses' => 'OrganizationsController@getIndex',
    'as' => 'organizations.index'
]);

Route::get('/new-society', [
    // add new society form
    'uses' => 'OrganizationsController@newOrganization',
    'as' => 'organizations.new-organization'
]);

Route::post('/add-new-society', [
    // actually add new society
   'uses' => 'SocietiesController@addNewSociety',
    'as' => 'organizations.add-new-organization'
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

Route::get('new-activity', [
    'uses' => 'ActivitiesController@getNewActivityForm',
    'as' => 'activities.new-activity'
]);

Route::post('continue-to-new-activity', [
    'uses' => 'ActivitiesController@continueToAdd',
    'as' => 'activities.continue'
]);

//Gathika

Route::get('/supervisor','supervisorsController@supervisorView');
Route::get('/pending','supervisorsController@pendingActivities');
Route::get('/validated','supervisorsController@validatedActivities');
Route::get('/rejected','supervisorsController@rejecteddActivities');
Route::get('/activity/{id}','supervisorsController@activityShow');
Route::post('/activity/{id}/validate','supervisorsController@activityValidate');


// Admin Routes

Route::get('admin', [
    'uses' => 'AdminController@getIndex',
    'as' => 'admin.index'
]);

Route::get('admin/all-students', [
    'uses' => 'AdminController@getAllStudents',
    'as' => 'admin.all-students',
]);

Route::get('admin/all-supervisors', [
    'uses' => 'AdminController@getAllSupervisors',
    'as' => 'admin.all-supervisors'
]);

Route::get('admin/flag-user/{user_id}', [
    'uses' => 'AdminController@flagUser',
    'as' => 'admin.flag-user'
]);


// Test Route
Route::get('test', function() {
    $flag = \App\User::getFlag(1);
    dd($flag);
});

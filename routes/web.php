<?php


Route::get('/', function () {
    return view('welcome');
})->name('welcome');
/*
 * Convention for naming the routes: use lowercase letters, hyphens, periods, Use Plurals
 * Convention for naming Controller methods: Use camelCase
 * */

// Dashboards
//still not properly set

Route::get('admin/dashboard', [
    'uses' => 'AdminController@getDashboard',
    'as' => 'admin.dashboard',
]);

Route::get('student/dashboard', [
    'uses' => 'StudentsController@getDashboard',
    'as' => 'students.dashboard'
]);

//not in use ??????????????????????????????????????????????
Route::get('supervisors/dashboard', [
    'uses' => 'SupervisorsController@supervisorView',
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

Route::post('/supervisors/addDetails', [
    'uses' => 'SupervisorsController@addNewSupervisor',
    'as' => 'supervisor.addDetails'
]);
// End of Supervisor Routes

// Organization, Sport, Competition, Achievement Routes

//SPORTS
Route::get('/sports', [
    // view all sports
    'uses' => 'SportsController@getIndex',
    'as' => 'sports.index'
]);

Route::get('/new-sport-activity', [
    // add new sport activity form
    'uses' => 'SportsController@newSportActivity',
    'as' => 'sports.new-sport-activity'
]);

Route::post('/add-new-sport-activity', [
    // actually add new sport activity
    'uses' => 'SportsController@addNewSportActivity',
    'as' => 'sports.add-new-sport-activity'
]);

//ORGANIZATION
Route::get('/organizations', [
    // view all organizations
    'uses' => 'OrganizationsController@getIndex',
    'as' => 'organizations.index'
]);

Route::get('/new-organization-activity', [
    // add new organization activity form
    'uses' => 'OrganizationsController@newOrganizationActivity',
    'as' => 'organizations.new-organization-activity'
]);

Route::post('/add-new-organization-activity', [
    // actually add new organization activity
   'uses' => 'OrganizationsController@addNewOrganizationActivity',
    'as' => 'organizations.add-new-organization-activity'
]);

//COMPETITIONS
Route::get('/competitions', [
    // view all competitions
    'uses' => 'CompetitionsController@getIndex',
    'as' => 'competitions.index'
]);

Route::get('/new-competition-activity', [
    // add new competition activity form
    'uses' => 'CompetitionsController@newCompetitionActivity',
    'as' => 'competitions.new-competition-activity'
]);

Route::post('/add-new-competition-activity', [
    // actually add new competition activity
    'uses' => 'CompetitionController@addNewCompetition',
    'as' => 'competitions.add-new-competition-activity'
]);

//ACHIEVEMENT
Route::get('/new-achievement',[
    // add new achievement form
    'uses'=>'AchievementsController@newAchievement',
    'as'=>'achievements.new-achievement'
]);

Route::post('/add-new-achievement',[
    // actually add new achievement
    'uses'=>'AchievementsController@addNewAchievement',
    'as'=>'achievements.add-new-achievement'
]);

//ACTIVITIES
Route::get('new-activity', [
    // add new activity form
    'uses' => 'ActivitiesController@getNewActivityForm',
    'as' => 'activities.new-activity'
]);

Route::post('continue-to-new-activity', [
    // continuing to add new activity after selecting the type
    'uses' => 'ActivitiesController@continueToAdd',
    'as' => 'activities.continue'
]);

// End of Organization, Sport, Competition, Achievement Routes

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
    \App\Activity::getPendingActivities();
});

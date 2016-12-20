<?php

Route::get('/', function () {
    return view('welcome');
})->name('welcome')->middleware('auth');
/*
 * Convention for naming the routes: use lowercase letters, hyphens, periods, Use Plurals
 * Convention for naming Controller methods: Use camelCase
 * */

// Dashboards
// Still not properly set

Route::get('admin/dashboard', [
    'uses' => 'AdminController@getDashboard',
    'as' => 'admin.dashboard'
]);

Route::get('student/dashboard', [
    'uses' => 'StudentsController@getDashboard',
    'as' => 'students.dashboard',
])->middleware('auth','checkStudent');

//not in use ??????????????????????????????????????????????
Route::get('supervisors/dashboard', [
    'uses' => 'SupervisorsController@supervisorView',
    'as' => 'supervisors.dashboard'
])->middleware('auth', 'checkSupervisor');


//user Login
Route::get('/login',function(){
    return view('user_login');
});

Route::post('/loginDetails',[
    'uses' => 'UsersController@loginUser',
    'as' => 'userLogin'
]);



// Student Routes

Route::get('students/profile/{index_no}', [
    'uses' => 'StudentsController@getDashboard',
    'as' => 'students.profile'
])->middleware('auth', 'checkStudent');

Route::get('/students/register', [
    // add new student form
    'uses' => 'StudentsController@newStudent',
    'as' => 'students.register'
])->middleware('auth', 'checkStudent');

Route::post('/students/addDetails',[
    // actually add new student
    'uses' => 'StudentsController@addNewStudent',
    'as' => 'student.addDetails'
])->middleware('auth', 'checkStudent');

// End of Student Routes

// Supervisor Routes

Route::get('/supervisors/register', [
    'uses' => 'SupervisorsController@newSupervisor',
    'as' => 'supervisors.register'
])->middleware('auth', 'checkSupervisor');

Route::post('/supervisors/addDetails', [
    'uses' => 'SupervisorsController@addNewSupervisor',
    'as' => 'supervisor.addDetails'
])->middleware('auth', 'checkSupervisor');
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
])->middleware('auth', 'checkStudent');

Route::post('/add-new-sport-activity', [
    // actually add new sport activity
    'uses' => 'SportsController@addNewSportActivity',
    'as' => 'sports.add-new-sport-activity'
])->middleware('auth', 'checkStudent');

Route::get('/new-sport', [
    // add new sport form
    'uses' => 'SportsController@newSport',
    'as' => 'sports.new-sport'
])->middleware('auth', 'checkSupervisor');

Route::post('/add-new-sport', [
    // actually add new sport
    'uses' => 'SportsController@addNewSport',
    'as' => 'sports.add-new-sport'
])->middleware('auth', 'checkSupervisor');

// ORGANIZATION
Route::get('/organizations', [
    // view all organizations
    'uses' => 'OrganizationsController@getIndex',
    'as' => 'organizations.index'
]);

Route::get('/new-organization-activity', [
    // add new organization activity form
    'uses' => 'OrganizationsController@newOrganizationActivity',
    'as' => 'organizations.new-organization-activity'
])->middleware('auth', 'checkStudent');

Route::post('/add-new-organization-activity', [
    // actually add new organization activity
   'uses' => 'OrganizationsController@addNewOrganizationActivity',
    'as' => 'organizations.add-new-organization-activity'
])->middleware('auth', 'checkStudent');

Route::get('/new-organization', [
    // add new organization form
    'uses' => 'OrganizationsController@newOrganization',
    'as' => 'organizations.new-organization'
])->middleware('auth', 'checkSupervisor');

Route::post('/add-new-organization', [
    // actually add new organization
    'uses' => 'OrganizationsController@addNewOrganization',
    'as' => 'organizations.add-new-organization'
])->middleware('auth', 'checkSupervisor');

Route::get('/organizations/{logo_name}',[
    'uses'=>'OrganizationsController@getLogo',
    'as'=>'organizations.get-logo'
]);

// COMPETITIONS
Route::get('/competitions', [
    // view all competitions
    'uses' => 'CompetitionsController@getIndex',
    'as' => 'competitions.index'
]);

Route::get('/new-competition-activity', [
    // add new competition activity form
    'uses' => 'CompetitionsController@newCompetitionActivity',
    'as' => 'competitions.new-competition-activity'
])->middleware('auth', 'checkStudent');

Route::post('/add-new-competition-activity', [
    // actually add new competition activity
    'uses' => 'CompetitionsController@addNewCompetitionActivity',
    'as' => 'competitions.add-new-competition-activity'
])->middleware('auth', 'checkStudent');

// ACHIEVEMENT
Route::get('/new-achievement',[
    // add new achievement form
    'uses'=>'AchievementsController@newAchievement',
    'as'=>'achievements.new-achievement'
])->middleware('auth', 'checkStudent');

Route::post('/add-new-achievement',[
    // actually add new achievement
    'uses'=>'AchievementsController@addNewAchievement',
    'as'=>'achievements.add-new-achievement'
])->middleware('auth', 'checkStudent');

// ACTIVITIES
Route::get('new-activity', [
    // add new activity form
    'uses' => 'ActivitiesController@getNewActivityForm',
    'as' => 'activities.new-activity'
])->middleware('auth', 'checkStudent');

Route::post('continue-to-new-activity', [
    // continuing to add new activity after selecting the type
    'uses' => 'ActivitiesController@continueToAdd',
    'as' => 'activities.continue'
])->middleware('auth', 'checkStudent');

Route::get('/activities/{activity_id}',[
    'uses'=>'ActivitiesController@getImage',
    'as'=>'activities.get-image'
])->middleware('auth');

// End of Organization, Sport, Competition, Achievement Routes

// Gathika

Route::group(['middleware' => ['auth', 'checkSupervisor']], function(){
    Route::get('/supervisor','supervisorsController@supervisorView');
    Route::get('/pending','supervisorsController@pendingActivities');
    Route::get('/validated','supervisorsController@validatedActivities');
    Route::get('/rejected','supervisorsController@rejectedActivities');
    Route::get('/pending_activity/{id}','supervisorsController@activityShow');
    Route::get('/validated_activity/{id}','supervisorsController@validatedActivityShow');
    Route::post('/activity/{id}/validate','supervisorsController@activityValidate');

});


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

Route::get('admin/student_profile/{index_no}',[
    'uses' => 'AdminController@getStudentProfile',
    'as' => 'admin.student-profile'
]);

Route::get('admin/sport/{sport_id}', [
    'uses' => 'AdminController@getSportProfile',
    'as' => 'admin.sport-profile',
]);

Route::get('admin/organization{organization_id}', [
    'uses' => 'AdminController@getOrganizationProfile',
    'as' => 'admin.organization-profile'
]);

// end of Admin Routes

// Reports Routes

Route::get('/reports/bar-charts', [
    'uses' => 'ReportsController@getBarCharts',
    'as' => 'reports.bar-charts'
]);

// Test Route
Route::get('test', function() {
//    var_dump(\App\Student::getOrganizationsOfStudent('140001A'));
//    var_dump(\App\Student::getSportsOfStudent('140001A'));
//    var_dump(\App\Student::getOrganizationsOfStudent('140001A'));
    var_dump(\App\Student::getAchievementsOfStudent('150002D'));
});


<?php

use App\Http\Controllers\AssessmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\StudentController;


//Dashboard
Route::get('/', function () {
    return view('assessment.index');
});


// Assessment
Route::get('/assessment', [AssessmentController::class, 'index'])->name('assessment.index');
Route::get('/assessment/list/create', [AssessmentController::class, 'create'])->name('assessment.create');
Route::get('/assessment/list', [AssessmentController::class, 'index'])->name('assessment.list');
Route::post('/assessment/list', [AssessmentController::class, 'store'])->name('assessment.store');

Route::resource('assessment', AssessmentController::class);

//Students
Route::resource('students', StudentController::class);


// Attendance
Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
Route::get('/attendance/{club}', [AttendanceController::class, 'show'])->name('attendance.show');
Route::post('/attendance/{club}/store', [AttendanceController::class, 'store'])->name('attendance.store');



// Activity 
//Route::get('/activity', function () {
    //return view('activity.index');
//});

//Route::get('/activity/add', function () {
  //  return view('activity.create');
//});

// Route to display the list of activities
Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');

// Route to display the add activity form
Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');

// Club 
Route::get('/club/kelab', [ClubController::class, 'showKelabClubs'])->name('club.kelab');
Route::post('/club/add', [ClubController::class, 'store'])->name('clubs.store');
Route::get('/club/sukan', [ClubController::class, 'showSukanClubs'])->name('club.sukan');
Route::get('/club/unitberuniform', [ClubController::class, 'showUnitBeruniformClubs'])->name('club.unitberuniform');

Route::get('/club', function () {
    return view('club.index');
});

Route::get('/club/add', function () { 
    return view('club.create'); })->name('club.create');

// Registration
Route::get('/registration', function (){
    return view('registration.index');
})->name('registration.index');

Route::get('/registration/kelab', function (){
    return view('registration.kelab');
})->name('registration.kelab');

Route::get('/registration/sukan', function () {
    return view('registration.sukan');
})->name('registration.sukan');

Route::get('/registration/beruniform', function() {
    return view('registration.beruniform');
})->name('registration.beruniform');


// Profile 
Route::get('/profile', function () {
    return view('profile.index');
})->name('profile.index');

Route::get('/login', function () {
    return view('login.index');
})->name('login.index');

Route::get('/assessment', function () {
    return view('assessment.index');
})->name('assessment.index');

Route::get('/profile/edit', function () {
    return view('profile.edit');
})->name('profile.edit');

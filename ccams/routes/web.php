<?php

use App\Http\Controllers\AssessmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;


use App\Http\Controllers\ActivityController;


//Dashboard
Route::get('/', function () {
    return view('assessment.index');
});


// Assessment
Route::get('/assessment', [AssessmentController::class, 'index'])->name('assessment.index');
Route::get('/assessment/list/create', [AssessmentController::class, 'create'])->name('assessment.create');
Route::get('/assessment/list', [AssessmentController::class, 'index'])->name('assessment.list');
Route::post('/assessment/list', [AssessmentController::class, 'store'])->name('assessment.store');
Route::post('/club/add', [ClubController::class, 'store'])->name('clubs.store');

Route::resource('assessment', AssessmentController::class);



// Attendance 
Route::get('/attendance', function () {
    return view('attendance.index');
});

Route::get('/attendance/coding-robotics', function () {
    return view('attendance.coding_robotics');
});

Route::get('/attendance/stjohns', function () {
    return view('attendance.stjohns');
});

Route::get('/attendance/{club}', [AttendanceController::class, 'show'])->name('attendance.show');



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
Route::get('/club', function () {
    return view('club.index');
});

Route::get('/club/add', function () {
    return view('club.create');
});

Route::get('/club/kelab', function () {
    return view('club.kelab');
})->name('club.kelab');

Route::get('/club/sukan', function () {
    return view('club.sukan');
})->name('club.sukan');

Route::get('/club/unitberuniform', function () {
    return view('club.unitberuniform');
})->name('club.unitberuniform');


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

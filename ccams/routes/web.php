<?php

use App\Http\Controllers\AssessmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;

//Dashboard
Route::get('/', function () {
    return view('login.index');
});

// Assessment
Route::get('/assessment', [AssessmentController::class, 'index'])->name('assessment.index');
Route::get('/assessment/list/create', [AssessmentController::class, 'create'])->name('assessment.create');
Route::get('/assessment/list', [AssessmentController::class, 'index'])->name('assessment.list');
Route::post('/assessment/list', [AssessmentController::class, 'store'])->name('assessment.store');
Route::resource('assessment', AssessmentController::class);
Route::get('assessment/{assessment_id}/edit', [AssessmentController::class, 'edit'])->name('assessment.edit');
Route::put('assessment/{assessment_id}', [AssessmentController::class, 'update'])->name('assessment.update');

//Students
//Route::resource('students', StudentController::class);

// Attendance
Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
Route::get('/attendance/{club}', [AttendanceController::class, 'show'])->name('attendance.show');
Route::post('/attendance/{club}/store', [AttendanceController::class, 'store'])->name('attendance.store');
// Route to update a student's attendance
Route::put('/attendance/{studentId}', [AttendanceController::class, 'update'])->name('attendance.update');


// Activities
Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
Route::get('/activities/{activity:activity_id}/edit', [ActivityController::class, 'edit'])->name('activities.edit');
Route::put('/activities/{activity:activity_id}', [ActivityController::class, 'update'])->name('activities.update');



// Club 
Route::get('/club/kelab', [ClubController::class, 'showKelabClubs'])->name('club.kelab');
Route::post('/club/add', [ClubController::class, 'store'])->name('clubs.store');
Route::get('/club/sukan', [ClubController::class, 'showSukanClubs'])->name('club.sukan');
Route::get('/club/unitberuniform', [ClubController::class, 'showUnitBeruniformClubs'])->name('club.unitberuniform');
Route::get('/club/details/{club_id}', [ClubController::class, 'showDetails'])->name('club.details');

Route::get('/club/{club_id}/edit', [ClubController::class, 'edit'])->name('club.edit');
Route::post('/club', [ClubController::class, 'store'])->name('club.store');
Route::put('/club/{club_id}', [ClubController::class, 'update'])->name('club.update');




Route::get('/club', function () {
    return view('club.index');
})->name('club.index');

Route::get('/club/add', function () { 
    return view('club.create'); })->name('club.create');

// Registration
Route::get('/registration', function (){
    return view('registration.index');
})->name('registration.index');

Route::get('/registration/kelab', [RegistrationController::class, 'kelabIndex'])
    ->name('registration.kelab');

Route::get('/registration/sukan', [RegistrationController::class, 'sukanIndex'])
    ->name('registration.sukan');

Route::get('/registration/beruniform', [RegistrationController::class, 'beruniformIndex'])
    ->name('registration.beruniform');

Route::post('/registration/{clubId}/{clubType}', [RegistrationController::class, 'register'])
    ->name('registration.register');

Route::get('/registration/viewRegister', [RegistrationController::class, 'viewRegister'])
    ->name('registration.viewRegister');

Route::delete('/registration/{registrationId}', [RegistrationController::class, 'unregister'])
    ->name('registration.unregister');

// Profile 
// Route::get('/profile', function () {
//     return view('profile.index');
// })->name('profile.index');
Route::get('/profile/edit', function () {
    return view('profile.edit');
})->name('profile.edit');

Route::get('/profile', [UserController::class, 'showprofile'])->name('profile.index');
Route::post('/profile/edit', [UserController::class, 'editprofile'])->name('profile.edit');

// login
Route::get('/login/index', [UserController::class, 'showLoginForm'])->name('login.index');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login.index'); // 
Route::post('/login', [UserController::class, 'login'])->name('login.submit'); // 
// Route::get('/logout', [UserController::class, 'logout'])->name('login.index'); // 处理注销请求

Route::get('/login/signin', [UserController::class, 'create'])->name('login.signin');
Route::post('/login/signin', [UserController::class, 'store'])->name('signin.store');
// Route::post('/signup', [UserController::class, 'store'])->name('signup.store');

//reset password
Route::get('/login/reset', function () {
    return view('login/reset');
})->name('login.reset');

Route::post('/reset-password', [UserController::class, 'resetPassword'])->name('login.resetp');


Route::post('/check-email', [UserController::class, 'checkEmail'])->name('check.email');
Route::post('/check-name', [UserController::class, 'checkName'])->name('check.name');
Route::post('/check-ic', [UserController::class, 'checkIC'])->name('check.ic');
Route::post('/check/email/ic/match', [UserController::class, 'checkEmailAndICMatch'])->name('check.email.ic.match');


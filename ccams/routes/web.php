<?php

use App\Http\Controllers\AssessmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RegistrationController;


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
//Route::resource('students', StudentController::class);

// Attendance
Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');
Route::get('/attendance/{club}', [AttendanceController::class, 'show'])->name('attendance.show');
Route::post('/attendance/{club}/store', [AttendanceController::class, 'store'])->name('attendance.store');
// Route to update a student's attendance
Route::put('/attendance/{studentId}', [AttendanceController::class, 'update'])->name('attendance.update');


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
Route::get('/club/details/{club_id}', [ClubController::class, 'showDetails'])->name('club.details');

Route::get('/club/{id}/edit', [ClubController::class, 'edit'])->name('club.edit');
Route::post('/club', [ClubController::class, 'store'])->name('club.store');
Route::put('/club/{id}', [ClubController::class, 'update'])->name('club.update');




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

// Profile 
Route::get('/profile', function () {
    return view('profile.index');
})->name('profile.index');

Route::get('/assessment', function () {
    return view('assessment.index');
})->name('assessment.index');

Route::get('/profile/edit', function () {
    return view('profile.edit');
})->name('profile.edit');

// login
use App\Http\Controllers\AuthController;


// 登录路由
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.show'); // 显示登录表单
Route::post('/login', [AuthController::class, 'login'])->name('login.submit'); // 处理登录请求
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // 处理注销请求



Route::get('/login', function () {
    return view('login.index');
})->name('login.index');

Route::get('/login/signin', function () {
    return view('login.signin');
})->name('longin.signin');

Route::get('/signin', function () {
    return view('login.signin');
})->name('login.signin');

use App\Http\Controllers\SignUpController;

Route::post('/signup', [SignUpController::class, 'store'])->name('signup.store');


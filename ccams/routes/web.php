<?php

use App\Http\Controllers\AssessmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

//Root Page
Route::get('/', [UserController::class, 'showLoginForm'])->name('login');

Route::middleware(['auth'])->group(function () {

    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'showUserSummary'])->name('dashboard.index');

    // Assessment
    Route::get('/assessment', [AssessmentController::class, 'index'])->name('assessment.index');
    Route::get('/assessment/list/{club_id}', [AssessmentController::class, 'list'])->name('assessment.list');
    Route::get('/assessment/create/{club_id}', [AssessmentController::class, 'create'])->name('assessment.create');
    Route::post('/assessment/store/{club_id}', [AssessmentController::class, 'store'])->name('assessment.store');
    Route::get('/assessment/{assessment_id}/edit', [AssessmentController::class, 'edit'])->name('assessment.edit');
    Route::put('/assessment/{assessment_id}', [AssessmentController::class, 'update'])->name('assessment.update');
    Route::delete('/assessment/{assessment_id}', [AssessmentController::class, 'destroy'])->name('assessment.destroy');
    Route::get('/assessment/{assessment_id}/show', [AssessmentController::class, 'show'])->name('assessment.show');
    Route::get('/assessment/view/{club_id}', [AssessmentController::class, 'view'])->name('assessment.view');
    Route::get('/assessment/classlist/{classroom}', [AssessmentController::class, 'classlist'])->name('assessment.classlist');
    Route::get('/assessment/viewclass/{student_id}', [AssessmentController::class, 'viewclass'])->name('assessment.viewclass');

    // Attendance
    Route::get('/attendance/student', [AttendanceController::class, 'indexStudent'])->name('attendance.indexStudent');
    Route::get('/attendance/teacher', [AttendanceController::class, 'indexTeacher'])->name('attendance.indexTeacher');
    Route::get('/attendance/{clubs}', [AttendanceController::class, 'show'])->name('attendance.show');
    Route::post('/attendance/{clubs}/store', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::put('/attendance/{studentId}', [AttendanceController::class, 'update'])->name('attendance.update');
    Route::get('/attendance/details/{user_id}/{club_id}', [AttendanceController::class, 'viewDetails'])->name('attendance.viewDetails');
    Route::get('/attendance/total-present/{user_id}/{club_id}', [AttendanceController::class, 'getTotalPresent'])->name('attendance.totalPresent');

    // Activity
    Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
    Route::get('/activities/create', [ActivityController::class, 'create'])->name('activities.create');
    Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
    Route::get('/activities/{activity:activity_id}/edit', [ActivityController::class, 'edit'])->name('activities.edit');
    Route::put('/activities/{activity:activity_id}', [ActivityController::class, 'update'])->name('activities.update');
    Route::delete('/activities/{activity:activity_id}', [ActivityController::class, 'destroy'])->name('activities.destroy');
    Route::get('/activities/{activity}', [ActivityController::class, 'show'])->name('activities.show');


    // Club 
    Route::get('/club/kelab', [ClubController::class, 'showKelabClubs'])->name('club.kelab');
    Route::post('/club/add', [ClubController::class, 'store'])->name('clubs.store');
    Route::get('/club/sukan', [ClubController::class, 'showSukanClubs'])->name('club.sukan');
    Route::get('/club/unitberuniform', [ClubController::class, 'showUnitBeruniformClubs'])->name('club.unitberuniform');
    Route::get('/club/details/{club_id}', [ClubController::class, 'showDetails'])->name('club.details');
    Route::delete('/club/{club_id}', [ClubController::class, 'destroy'])->name('club.destroy');
    Route::get('/club/{club_id}/edit', [ClubController::class, 'edit'])->name('club.edit');
    Route::post('/club', [ClubController::class, 'store'])->name('club.store');
    Route::put('/club/{club_id}', [ClubController::class, 'update'])->name('club.update');
    Route::get('/club', function () {
        return view('club.index');
    })->name('club.index');
    Route::get('/club/add', function () {
        return view('club.create');
    })->name('club.create');
    Route::get('/club/student/{id}', [UserController::class, 'showStudentProfile'])->name('club.student');    
    Route::get('/club/search', [ClubController::class, 'search'])->name('club.search');


    // Registration
    Route::get('/registration', function () {
        return view('registration.index');
    })->name('registration.index');
    Route::get('/registration/persatuan', [RegistrationController::class, 'persatuanIndex'])->name('registration.persatuan');
    Route::get('/registration/sukan', [RegistrationController::class, 'sukanIndex'])->name('registration.sukan');
    Route::get('/registration/beruniform', [RegistrationController::class, 'beruniformIndex'])->name('registration.beruniform');
    Route::post('/registration/{clubId}/{clubType}', [RegistrationController::class, 'register'])->name('registration.register');
    Route::get('/registration/viewRegister', [RegistrationController::class, 'viewRegister'])->name('registration.viewRegister');
    Route::delete('/registration/{registrationId}', [RegistrationController::class, 'unregister'])->name('registration.unregister');

    // Profile 
    Route::get('/profile/edit', function () {
        return view('profile.edit');
    })->name('profile.edit');
    Route::get('/profile', [UserController::class, 'showprofile'])->name('profile.index');
    Route::post('/profile/edit', [UserController::class, 'editprofile'])->name('profile.edit');
    //View profile by list
    Route::get('users', [UserController::class, 'index'])->name('users.list');
    Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
});

// Login
Route::post('/login', [UserController::class, 'login'])->name('login.submit'); // 
Route::get('/login', [UserController::class, 'logout'])->name('logout'); // 
Route::get('/login/signin', [UserController::class, 'create'])->name('login.signin');
Route::post('/login/signin', [UserController::class, 'store'])->name('signin.store');

//Reset password
Route::get('/login/reset', function(){return view('login.reset');})->name('login.reset');
Route::post('/reset-password', [UserController::class, 'resetPassword'])->name('login.resetp');
Route::post('/check-email', [UserController::class, 'checkEmail'])->name('check.email');
Route::post('/check-name', [UserController::class, 'checkName'])->name('check.name');
Route::post('/check-ic', [UserController::class, 'checkIC'])->name('check.ic');
Route::post('/check/email/ic/match', [UserController::class, 'checkEmailAndICMatch'])->name('check.email.ic.match');

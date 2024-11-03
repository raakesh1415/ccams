<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/assessment', function () {
    return view('assessment.index');
});

Route::get('/assessment/add', function () {
    return view('assessment.create');
});

Route::get('/attendance', function () {
    return view('attendance.index');
});

Route::get('/attendance/add_attendance', function () {
    return view('attendance.add_attendance');
});

Route::get('/activity', function () {
    return view('activity.index');
});

Route::get('/activity/add', function () {
    return view('activity.create');
});

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
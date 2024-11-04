<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('assessment.index');
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

Route::get('/attendance/coding-robotics', function () {
    return view('attendance.coding_robotics');
});

Route::get('/attendance/stjohns', function () {
    return view('attendance.stjohns');
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

// registration routes start
Route::get('/registration', function () {
    return view('registration.index');
})->name('registration.index');

Route::get('/registration/kelab', function () {
    return view('registration.kelab');
})->name('registration.kelab');

Route::get('/registration/sukan', function () {
    return view('registration.sukan');
})->name('registration.sukan');

Route::get('/registration/berunifrom', function () {
    return view('registration.beruniform');
})->name('registration.beruniform');
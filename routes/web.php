<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RingtoneController;
use App\Http\Controllers\TaskController;

// =======================
// AUTH & HOME ROUTES
// =======================

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])
    ->name('home')
    ->middleware('auth');


// =======================
// ADMIN ROUTES
// =======================

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('dashboard.admin-role.index');
    })->name('admin.dashboard');

    // Tambahkan route admin lain di sini jika ada
});


// =======================
// USER ROUTES
// =======================

Route::middleware(['auth', 'isUser'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('dashboard.user-role.index');
    })->name('user.dashboard');

    // Task routes
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');

    // Tambahkan route user lainnya di sini
});

Route::middleware(['auth'])->group(function () {
    Route::get('/ringtones', [RingtoneController::class, 'index'])->name('ringtones.index');
    Route::get('/ringtones/create', [RingtoneController::class, 'create'])->name('ringtones.create');
    Route::post('/ringtones/store', [RingtoneController::class, 'store'])->name('ringtones.store');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RingtoneController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\Task;

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
    Route::get('/admin/dashboard', [UserController::class, 'index'])->name('admin.dashboard');

    // Tambahkan route admin lain di sini jika ada
    // Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
});


// =======================
// USER ROUTES
// =======================

Route::middleware(['auth', 'isUser'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('dashboard.user-role.tasks');
    })->name('user.dashboard');

    // Task routes
    Route::get('/user/dashboard', [TaskController::class, 'index'])->name('user.dashboard');
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks/store', [TaskController::class, 'store'])->name('tasks.store');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    // Tambahkan route user lainnya di sini
    Route::patch('/tasks/{task}/complete', [TaskController::class, 'markAsCompleted'])->name('tasks.complete');

});

Route::middleware(['auth'])->group(function () {
    Route::get('/ringtones', [RingtoneController::class, 'index'])->name('ringtones.index');
    Route::get('/ringtones/create', [RingtoneController::class, 'create'])->name('ringtones.create');
    Route::post('/ringtones', [RingtoneController::class, 'store'])->name('ringtones.store');
    Route::get('/ringtones/{ringtone}/edit', [RingtoneController::class, 'edit'])->name('ringtones.edit');
    Route::put('/ringtones/{ringtone}', [RingtoneController::class, 'update'])->name('ringtones.update');
    Route::delete('/ringtones/{ringtone}', [RingtoneController::class, 'destroy'])->name('ringtones.destroy');

    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{ringtone}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{ringtone}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{ringtone}', [CategoryController::class, 'destroy'])->name('categories.destroy');


});

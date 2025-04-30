<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TaskController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:4'
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return response()->json([
        'message' => 'User registered successfully',
        'user' => $user
    ]);
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Route::get('/tasks', [TaskController::class, 'index']);
// Route::post('/tasks', [TaskController::class, 'store']);
// Route::post('/logout', [AuthController::class, 'logout']);

Route::apiResource('all-tasks', TaskController::class);



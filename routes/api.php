<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

//! Task routes
Route::delete('/task/{id}', [ TaskController::class, 'deleteTask' ]);
Route::get('/task', [ TaskController::class, 'getTasks' ]);
Route::get('/task/{id}', [ TaskController::class, 'getTaskById' ]);
Route::post('/task', [ TaskController::class, 'createTask' ]);
Route::put('/task/{id}', [ TaskController::class, 'editTask' ]);

//! User routes
Route::delete('/user/{id}', [ UserController::class, 'deleteUser' ]);
Route::get('/user/{id}', [ UserController::class, 'getUser' ]);
Route::post('/user', [ UserController::class, 'createUser' ]);
Route::put('/user/{id}', [ UserController::class, 'editUser' ]);
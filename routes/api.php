<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

Route::delete('/task/{id}', [ TaskController::class, 'deleteTask' ]);
Route::get('/task', [ TaskController::class, 'getTasks' ]);
Route::get('/task/{id}', [ TaskController::class, 'getTaskById' ]);
Route::post('/task', [ TaskController::class, 'createTask' ]);
Route::put('/task/{id}', [ TaskController::class, 'editTask' ]);

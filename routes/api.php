<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::delete('/task/{id}', function ($id) { return "Task ".$id." deleted";});
Route::get('/task', function () { return "Task list";});
Route::get('/task/{id}', function ($id) { return "Task ".$id;});
Route::post('/task', function () { return "Created task";});
Route::put('/task/{id}', function ($id) { return "Task ".$id." edited";});

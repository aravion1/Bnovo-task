<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/test', function (Request $request) {return 'test';});

Route::get('/guests', [\App\Http\Controllers\GuestController::class, 'list']);
Route::post('/guests/create', [\App\Http\Controllers\GuestController::class, 'create']);
Route::get('/guests/{id}', [\App\Http\Controllers\GuestController::class, 'get']);
Route::patch('/guests/{id}', [\App\Http\Controllers\GuestController::class, 'update']);
Route::delete('/guests/{id}', [\App\Http\Controllers\GuestController::class, 'delete']);

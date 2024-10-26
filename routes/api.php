<?php

use App\Http\Controllers\GuestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/guests', [GuestController::class, 'index']);
Route::post('/guests', [GuestController::class, 'store']);
Route::get('/guests/{guest}', [GuestController::class, 'show']);
Route::put('/guests/{guest}', [GuestController::class, 'update']);
Route::delete('/guests/{guest}', [GuestController::class, 'destroy']);

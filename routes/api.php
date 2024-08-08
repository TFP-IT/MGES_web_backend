<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\API\GuestResourceController;
use App\Http\Controllers\API\ResourceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->post('resources', ResourceController::class);
Route::post('resources-guest', GuestResourceController::class);


// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);

// Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DonaturController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\InrDataController;
use App\Http\Controllers\api\RecruiterDataController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/login', [AuthController::class, 'index']);
Route::post('/create-auth', [AuthController::class, 'createAuth']);
// Route::post('/auth', [AuthController::class, 'auth']);

Route::apiResource('donatur', DonaturController::class);
Route::post('/donatur', [DonaturController::class, 'createDonatur']);


Route::get('/inrdata', [InrDataController::class, 'index']);
Route::get('/inrdata/{id}', [InrDataController::class, 'show']);
Route::post('/inrdata', [InrDataController::class, 'createInrdata']);
Route::put('/inrdata/{id}', [InrDataController::class, 'update']);
Route::delete('/inrdata/{id}', [InrDataController::class, 'destroy']);

Route::get('/recruiter', [RecruiterDataController::class, 'index']);
Route::post('/recruiter', [RecruiterDataController::class, 'createRecruiterData']);
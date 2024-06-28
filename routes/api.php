<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\DonaturController;
use App\Http\Controllers\Api\InrDataController;
use App\Http\Controllers\api\RecruiterDataController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/donatur',[DonaturController::class,'index']);
// Route::get('/donatur/{id}',[DonaturController::class,'show']);
// Route::post('/donatur',[DonaturController::class,'store']);
// Route::put('/donatur/{id}',[DonaturController::class,'update']);
// Route::delete('/donatur/{id}',[DonaturController::class,'destroy']);

Route::apiResource('donatur', DonaturController::class);

Route::get('/inrdata', [InrDataController::class, 'index']);
Route::get('/inrdata/{id}', [InrDataController::class, 'show']);
Route::post('/inrdata', [InrDataController::class, 'store']);
Route::put('/inrdata/{id}', [InrDataController::class, 'update']);
Route::delete('/inrdata/{id}', [InrDataController::class, 'destroy']);

Route::get('/recruiter', [RecruiterDataController::class, 'index']);
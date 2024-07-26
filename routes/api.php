<?php

use Illuminate\Http\Request;
use App\Models\PriceGroupNotes;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DonaturController;
use App\Http\Controllers\Api\InrDataController;
use App\Http\Controllers\api\RecruiterDataController;
use App\Http\Controllers\API\PriceGroupNotesController;


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
Route::post('/auth/create', [AuthController::class, 'createAuth'])->name('auth.create');


Route::apiResource('donatur', DonaturController::class);
Route::post('/donatur', [DonaturController::class, 'createDonatur']);


Route::get('/inrdata', [InrDataController::class, 'index']);
Route::get('/inrdata/{id}', [InrDataController::class, 'show']);
Route::post('/inrdata', [InrDataController::class, 'createInrdata']);
Route::put('/inrdata/{id}', [InrDataController::class, 'update']);
Route::delete('/inrdata/{id}', [InrDataController::class, 'destroy']);

Route::get('/recruiter', [RecruiterDataController::class, 'index']);
Route::post('/recruiter', [RecruiterDataController::class, 'createRecruiterData']);

Route::get('/pricegroup', [PriceGroupNotesController::class, 'index']);
Route::post('/pricegroup', [PriceGroupNotesController::class, 'createPriceGroupNotes']);

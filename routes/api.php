<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\PerguruantinggiController;
use App\Http\Middleware\TokenValidation;
use App\Models\perguruantinggi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('signin',[AuthController::class,'signin']);


Route::resource('perguruantinggis',PerguruantinggiController::class);
Route::resource('fakultas', FakultasController::class);
Route::resource('jurusan', JurusanController::class);

Route::middleware(TokenValidation::class)->group(function(){
Route::post('signout',[AuthController::class,'signout']);

});


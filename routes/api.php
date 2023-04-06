<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/signin', [AuthController::class, 'signin']);

Route::group(['middleware' => ['auth:sanctum']], function (){
    Route::get('/signout', [AuthController::class, 'signout']);


    Route::group(['prefix' => 'projects'], function (){
    Route::get('/{project}', [ProjectController::class, 'get']);
    Route::get('/', [ProjectController::class, 'index']);
    Route::post('/', [ProjectController::class, 'create']);
    Route::patch('/{project}', [ProjectController::class, 'update']);
    Route::delete('/{project}', [ProjectController::class, 'delete']);
    });
});

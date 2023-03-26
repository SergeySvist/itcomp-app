<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'projects'], function (){
    Route::get('/{project}', [ProjectController::class, 'get']);
    Route::get('/', [ProjectController::class, 'index']);
    Route::post('/', [ProjectController::class, 'create']);
    Route::patch('/{project}', [ProjectController::class, 'update']);
    Route::delete('/{project}', [ProjectController::class, 'delete']);
});

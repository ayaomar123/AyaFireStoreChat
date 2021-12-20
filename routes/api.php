<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::resource('/chat', \App\Http\Controllers\ChatController::class);


//Route::get('chat',[\App\Http\Controllers\ChatController::class,'index']);
//Route::post('chat',[\App\Http\Controllers\ChatController::class,'store']);
//Route::post('chat/{id}',[\App\Http\Controllers\ChatController::class,'update']);
//Route::delete('chat',[\App\Http\Controllers\ChatController::class,'destroy']);


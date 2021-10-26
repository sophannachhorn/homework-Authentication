<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/signup', [UserController::class,'signup']);
Route::post('/login', [UserController::class,'login']);

Route::get('/posts', [PostController::class,'index']);
Route::get('/posts/{id}', [PostController::class,'show']);


Route::group(['middleware' => ['auth:sanctum']], function(){  
    Route::post('/posts', [PostController::class,'store']);
    Route::put('/posts/{id}', [PostController::class,'update']);
    Route::delete('/posts',[PostController::class,'destroy']);

    Route::post('/logout',[Usercontroller::class, 'logout']);
});
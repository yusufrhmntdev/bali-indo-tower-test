<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\API\PassportAuthController;



Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);



Route::middleware(['auth:api'])->group(function () {
   
    Route::get('get-user', [PassportAuthController::class, 'userInfo']);
    Route::post('comment/store',[CommentController::class,'store']);
    Route::resource('news', NewsController::class);

 
});
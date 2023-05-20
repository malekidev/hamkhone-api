<?php

use App\Http\Controllers\Api\v1\HomeController;
use App\Http\Controllers\Api\v1\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\v1\AuthController;

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

Route::prefix('v1')->group(function (){
    Route::group(['prefix' => 'auth'],function (){
        Route::post('register',[AuthController::class,'register']);
        Route::post('login',[AuthController::class,'login']);
        Route::post('profile',[ProfileController::class,'store'])->middleware("auth:sanctum");
        Route::post('user',[AuthController::class,'getUser'])->middleware("auth:sanctum");
        Route::post('logout',[AuthController::class,'logout'])->middleware("auth:sanctum");
        Route::post('logout-all',[AuthController::class,'logoutAll'])->middleware("auth:sanctum");
    });
    Route::group(['middleware' => ['auth:sanctum','profile']],function (){
        Route::post('homes',[HomeController::class,'store']);
    });


});

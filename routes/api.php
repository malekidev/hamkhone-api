<?php

use App\Http\Controllers\Api\v1\HomeController;
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
    Route::post('auth/register',[AuthController::class,'register']);
    Route::post('auth/login',[AuthController::class,'login']);
    Route::post('auth/logout',[AuthController::class,'logout'])->middleware("auth:sanctum");
    Route::post('auth/logout-all',[AuthController::class,'logoutAll'])->middleware("auth:sanctum");
    Route::group(['middleware' => ['auth:sanctum','profile']],function (){
        Route::post('homes',[HomeController::class,'store']);
    });
});

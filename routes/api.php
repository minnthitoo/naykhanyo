<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\LikeController;
use App\Http\Controllers\API\PoemController;
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

Route::controller(AuthController::class)->group(function(){

    Route::post('register', 'register');
    Route::post('login', 'login');

});

Route::middleware('auth:sanctum')->group(function(){

    Route::controller(LikeController::class)->group(function(){

        Route::post('like-unlike', 'like_unlike');

    });

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CategoryController::class)->group(function(){
    Route::get('/categories', 'categories');
});

Route::controller(PoemController::class)->group(function(){
    Route::get('/poems', 'poems');
});

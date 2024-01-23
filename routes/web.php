<?php

use App\Http\Controllers\Backend\AdminCategoryController;
use App\Http\Controllers\Backend\AdminDashboardController;
use App\Http\Controllers\Backend\AdminPoemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified', ])->group(function () {

    Route::middleware(['admin'])->group(function(){

        Route::prefix('admin')->name('admin.')->group(function(){

            // admin dashboard
            Route::controller(AdminDashboardController::class)->group(function(){
                Route::get('dashboard', 'dashboard')->name('dashboard');
            });

            // admin category
            Route::controller(AdminCategoryController::class)->prefix('category')->name('category.')->group(function(){

                Route::get('/manage', 'manage')->name('manage');

                Route::get('/get-categories', 'get_categories')->name('get-categories');

                Route::get('/get-categories-by-ajax', 'get_categories_by_ajax')->name('get-categories-by-ajax');

                Route::post('/store', 'store')->name('store');

                Route::post('/status-change', 'status_change')->name('status-change');

            });

            // admin poem
            Route::controller(AdminPoemController::class)->prefix('poems')->name('poems.')->group(function(){
                Route::get('/create', 'create')->name('create');
                Route::post('/create', 'store');
            });

        });

    });

    Route::middleware(['user'])->group(function(){


    });

});

Route::get('/', [UserController::class, 'dashboard'])->name('dashboard');

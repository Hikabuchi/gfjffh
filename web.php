<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApplicationController;

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

Route::get('/',[GalleryController::class,'index']);
Route::get('/register', [UserController::class, 'index_register']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/login', [UserController::class, 'index_login']);

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/application', [ApplicationController::class,'index']);
    Route::post('/application', [ApplicationController::class,'store']);
    Route::put('/application/{application}', [ApplicationController::class,'update']);
});


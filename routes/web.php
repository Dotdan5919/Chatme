<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/signin',[AuthController::class,'signin']);


Route::get('/signup',[App\Http\Controllers\AuthController::class,'index']);
Route::get('/signout',[AuthController::class,'signout']);
Route::get('/update',[AuthController::class,'update']);
Route::post('/upload',[ChatController::class,'store']);
Route::get('/uploader',[ChatController::class,'index']);




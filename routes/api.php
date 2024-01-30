<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/signin',[AuthController::class,'signin']);
Route::post('/signout',[AuthController::class,'signout']);



Route::post('/signup',[AuthController::class,'index']);
Route::post('/update',[AuthController::class,'update']);


//for uploading images
Route::post('/upload',[ChatController::class,'store']);
Route::get('/upload',[ChatController::class,'store']);
Route::get('/chats',[ChatController::class,'chat']);
Route::get('/contact',[ChatController::class,'all']);
// for sending messages
Route::post('/sendmessage',[ChatController::class,'send']);
Route::get('/currentchat',[ChatController::class,'current']);








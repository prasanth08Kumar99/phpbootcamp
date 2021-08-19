<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CustomerController;

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

Route::post('/users',[CustomerController::class, 'createUser']);
Route::get('/users',[CustomerController::class, 'getUsers']);
Route::get('/users/mail/{mail}',[CustomerController::class,'getUserByMail']);
Route::get('/users/phone/{phone}',[CustomerController::class,'getUserByPhone']);
Route::get('/users/name/{name}',[CustomerController::class,'getUserByName']);
Route::delete('/users/mail/{mail}',[CustomerController::class,'deleteUserByMail']);
Route::delete('/users/phone/{phone}',[CustomerController::class,'deleteUserByPhone']);
Route::delete('/users/name/{name}',[CustomerController::class,'deleteUserByName']);

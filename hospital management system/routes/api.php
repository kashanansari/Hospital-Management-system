<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::post('/patients/create', 'App\Http\Controllers\UserController@createpatients');
Route::post('/admit/create', 'App\Http\Controllers\UserController@createadmit');
Route::post('/test/create', 'App\Http\Controllers\UserController@testcreate');
Route::post('/check/create', 'App\Http\Controllers\UserController@createcheckout');
Route::post('/check/doct', 'App\Http\Controllers\UserController@createdoctors');
Route::post('/check/icu', 'App\Http\Controllers\UserController@creteicu');
Route::post('/check/dead','App\Http\Controllers\UserController@createdead');
Route::get('/get/pateints/{id}','App\Http\Controllers\UserController@getpatients');
Route::post('/doct/login','App\Http\Controllers\UserController@doctorlogin');
Route::post('/pat/login','App\Http\Controllers\UserController@loginPatients');

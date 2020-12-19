<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/fcm','App\Http\Controllers\ProgmobLanjutAPI@NotificationForAndroid');

Route::post('/add-mahasiswa','App\Http\Controllers\ProgmobLanjutAPI@addMahasiswa');
Route::post('/show-mahasiswa','App\Http\Controllers\ProgmobLanjutAPI@showMahasiswa');
Route::get('/show-all-mahasiswa','App\Http\Controllers\ProgmobLanjutAPI@showallMahasiswa');
Route::post('/post-token','App\Http\Controllers\ProgmobLanjutAPI@checkRecipients');

Route::get('/fcm/test','App\Http\Controllers\ProgmobLanjutAPI@testingFCM');

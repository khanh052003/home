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

//Music
Route::post('music/update', [App\Http\Controllers\AdminController::class, 'editmusic'])->name("editmusic");
Route::post('music/add', [App\Http\Controllers\AdminController::class, 'addmusic'])->name("addmusic");
Route::post('music/delete', [App\Http\Controllers\AdminController::class, 'deletemusic'])->name("deletemusic");

//albums
Route::post('album/update', [App\Http\Controllers\AdminController::class, 'editalbum'])->name("editalbum");
Route::post('album/add', [App\Http\Controllers\AdminController::class, 'addalbum'])->name("addalbum");
Route::post('album/delete', [App\Http\Controllers\AdminController::class, 'deletealbum'])->name("deletealbum");
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/author/', [App\Http\Controllers\AuthorController::class, 'create']);
Route::put('/author/{author}', [App\Http\Controllers\AuthorController::class, 'update']);
Route::delete('/author/{author}', [App\Http\Controllers\AuthorController::class, 'delete']);
Route::get('/author/', [App\Http\Controllers\AuthorController::class, 'retrieve']);

Route::post('/track/', [App\Http\Controllers\TrackController::class, 'create']);
Route::put('/track/{track}', [App\Http\Controllers\TrackController::class, 'update']);
Route::delete('/track/{track}', [App\Http\Controllers\TrackController::class, 'delete']);
Route::get('/track/', [App\Http\Controllers\TrackController::class, 'retrieve']);

Route::post('/album/', [App\Http\Controllers\AlbumController::class, 'create']);
Route::put('/album/{album}', [App\Http\Controllers\AlbumController::class, 'update']);
Route::delete('/album/{album}', [App\Http\Controllers\AlbumController::class, 'delete']);
Route::get('/album/', [App\Http\Controllers\AlbumController::class, 'retrieve']);

Route::post('/trackwithalbum/',[App\Http\Controllers\AlbumTrackController::class,'create']);

Route::get('/reletionauthor/', [App\Http\Controllers\AuthorController::class,'withAlbum']);
Route::get('/releationtrack/', [App\Http\Controllers\TrackController::class,'inAlbum']);
Route::get('/releationalbum/', [App\Http\Controllers\AlbumController::class,'trackInAlbum']);



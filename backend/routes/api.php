<?php

use App\Http\Controllers\DictionaryController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/szavak/{id}', [DictionaryController::class, 'wordsBySubject']);
Route::get('/szavak', [DictionaryController::class, 'words']);
Route::get('/temak', [DictionaryController::class, 'subjects']);

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
use App\Http\Controllers\AuthController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/users', [AuthController::class, 'index']);
Route::post('/users', [AuthController::class, 'add']);
Route::delete('/users/{id}', [AuthController::class, 'delete']);
Route::get('/users/{id}', [AuthController::class, 'showById']);
Route::put('/users/{id}', [AuthController::class, 'update']);
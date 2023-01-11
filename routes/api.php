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

Route::group(['namespace' => 'Api', 'prefix' => 'v1'], function (){
    Route::get('/token', [\App\Http\Controllers\Api\AuthController::class, '__invoke']);
    Route::get('/users', [\App\Http\Controllers\Api\User\IndexController::class, '__invoke']);
    Route::get('/users/{id}', [\App\Http\Controllers\Api\User\ShowController::class, '__invoke']);
    Route::get('/positions', [\App\Http\Controllers\Api\Position\IndexController::class, '__invoke']);
    Route::post('/users', [\App\Http\Controllers\Api\User\StoreController::class, '__invoke'])->middleware('auth:sanctum');

});

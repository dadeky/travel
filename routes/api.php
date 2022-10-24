<?php

use App\Http\Controllers\PersonController;
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
Route::post('/person', [PersonController::class, 'store']);
Route::get('/people', [PersonController::class, 'index']);
Route::put('/person/activate', [PersonController::class, 'activate']);
Route::delete('/person', [PersonController::class, 'destroy']);
Route::get('/person', [PersonController::class, 'show']);
Route::put('/person', [PersonController::class, 'update']);

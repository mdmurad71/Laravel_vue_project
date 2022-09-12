<?php

use App\Http\Controllers\ClientuserController;
use App\Http\Controllers\RoomsController;
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

Route::get('/getData', [RoomsController::class, 'getData']);
Route::get('/showData/{id}', [RoomsController::class, 'showData']);
Route::post('/login', [ClientuserController::class, 'login']);

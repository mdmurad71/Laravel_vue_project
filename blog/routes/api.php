<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfirmReserveController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\RoomreserveController;

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

Route::group([

    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('signup', [AuthController::class, 'signup']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});

Route::get('/getData', [RoomsController::class, 'getData']);


Route::get('/roomsData', [RoomsController::class, 'roomsData']);
Route::post('/upload', [RoomsController::class, 'roomUpload']);
Route::delete('/deleteData/{id}', [RoomsController::class, 'deleteData']);
Route::get('/showData/{id}', [RoomsController::class, 'showData']);
Route::post('/updateRoom/{id}', [RoomsController::class, 'updateRoom']);
Route::get('/reserveList', [RoomreserveController::class, 'reserveList']);
Route::delete('/deleteRequest/{id}', [RoomreserveController::class, 'deleteRequest']);
Route::post('/confirmOrder/{id}', [ConfirmReserveController::class, 'confirmOrder']);
Route::get('/confirmList', [ConfirmReserveController::class, 'confirmList']);


Route::post('/insertData', [DemoController::class, 'insertData']);

<?php

use App\Http\Controllers\ContactsController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiclesController;
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



Route::get('/fetch-vehicles', [VehiclesController::class, 'fetchVehicles']);
Route::post('/inquiries', [ContactsController::class, 'postInquiry']);
Route::post('/authanticate-user', [UserController::class, 'login']);



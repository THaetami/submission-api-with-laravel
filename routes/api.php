<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\SalesmanController;
use App\Http\Controllers\UserController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(UserController::class)->group(function () {
    Route::post('users', 'store'); // register user
});

Route::controller(AuthenticationController::class)->group(function () {
    Route::post('auth', 'login'); // login user
    Route::delete('auth', 'logout'); // login user
});

Route::controller(SalesmanController::class)->group(function () {
    Route::get('sales', 'index');
    Route::post('sales', 'store');
    Route::get('sales/{id}', 'detail');
    Route::put('sales/{id}', 'update');
    Route::delete('sales/{id}', 'destroy');
});

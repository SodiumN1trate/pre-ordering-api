<?php

use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SymbolController;
use App\Http\Controllers\Api\ColorController;
use App\Http\Controllers\Api\NavigationController;
use App\Http\Controllers\Api\PreorderController;
use App\Http\Controllers\Api\SizeController;
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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/me', [AuthController::class, 'user']);

Route::resource('products', ProductController::class);

Route::resource('colors', ColorController::class);

Route::resource('symbols', SymbolController::class);

Route::resource('navigations', NavigationController::class);

Route::resource('preorders', PreorderController::class);

Route::resource('sizes', SizeController::class);

<?php

use App\Http\Controllers\AmountController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SupllierController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [SupllierController::class, 'index']);
Route::resource('orders', OrderController::class);
Route::put('/orders/{order}/send', [OrderController::class, 'send']);
Route::get('/orders/{supllier}/create', [OrderController::class, 'create']);
Route::resource('amounts', AmountController::class);

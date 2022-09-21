<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return inertia('Welcome');
})->name('welcome');

// TODO: Restrict access via middlewares.
Route::get('orders', [OrderController::class, 'index'])->name('order.index');

Route::get('order', [OrderController::class, 'create'])->name('order.create');
Route::post('order', [OrderController::class, 'store'])->name('order.store');

Route::get('order/{order}', [OrderController::class, 'show'])->name('order.show');
Route::get('order/{order}/payment', [OrderController::class, 'payment'])->name('order.payment');
Route::get('order/{order}/process', [OrderController::class, 'processPayment'])->name('order.process_payment');


require __DIR__ . '/auth.php';

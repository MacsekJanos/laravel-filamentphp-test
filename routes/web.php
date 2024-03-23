<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\RelationManagerController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/statuses', [StatusController::class, 'index'])->name('statuses.index');
Route::get('/statuses/create', [StatusController::class, 'create'])->name('statuses.create');
Route::post('/statuses', [StatusController::class, 'store'])->name('statuses.store');
Route::get('/statuses/{status}/edit', [StatusController::class, 'edit'])->name('statuses.edit');
Route::put('/statuses/{status}', [StatusController::class, 'update'])->name('statuses.update');
Route::delete('/statuses/{status}', [StatusController::class, 'destroy'])->name('statuses.destroy');
//
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
//
Route::get('/items', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
Route::post('/items', [ItemController::class, 'store'])->name('items.store');
Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
//
Route::get('/relation-manager', [RelationManagerController::class, 'index'])->name('relation_manager.index');
Route::post('/relation-manager/addItem', [RelationManagerController::class, 'addItem'])->name('relationManager.addItem');
Route::delete('/relation-manager/destroy', [RelationManagerController::class, 'destroy'])->name('relationManager.destroy');
//
Route::get('/', [HomeController::class, 'index'])->name('home.index');


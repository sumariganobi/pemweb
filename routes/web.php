<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\GudangLocationController;
use App\Http\Controllers\TransactionsController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/locations-content', [DashboardController::class, 'locationsContent'])->name('locations.content');
Route::post('/locations', [GudangLocationController::class, 'store'])->name('locations.store');
Route::resource('locations', GudangLocationController::class);

Route::get('/items-content', [DashboardController::class, 'itemsContent'])->name('items.content');
Route::post('/items', [itemController::class, 'store'])->name('items.store');
Route::resource('items', itemController::class);

Route::get('/transactions-content', [DashboardController::class, 'transactionsContent'])->name('transactions.content');
// Route::get('/transactions/create', [TransactionsController::class, 'create'])->name('transactions.create');
Route::post('/transactions/store', [TransactionsController::class, 'store'])->name('transactions.store');
Route::resource('transactions', TransactionsController::class);
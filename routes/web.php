<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('pages.index');

Route::get('/inventories', [\App\Http\Controllers\InventoryController::class, 'index'])
    ->name('inventories.index');

Route::get('/inventories/create', [\App\Http\Controllers\InventoryController::class, 'create']);

Route::post('/inventories', [\App\Http\Controllers\InventoryController::class, 'store'])
    ->name('inventories.store');

Route::get('/inventories/{inventory}/edit',[\App\Http\Controllers\InventoryController::class, 'edit'])
    ->name('inventories.edit');

Route::patch('/inventories/{inventory}',[\App\Http\Controllers\InventoryController::class, 'update'])
    ->name('inventories.update');

Route::get('/inventories/{inventory}/delete', [\App\Http\Controllers\InventoryController::class, 'delete'])
    ->name('inventories.delete');

Route::delete('/inventories/{inventory}', [\App\Http\Controllers\InventoryController::class, 'destroy'])
    ->name('inventories.destroy');

Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

Route::get('/users/create', [\App\Http\Controllers\UserController::class, 'create']);

Route::post('/users', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');

Route::get('/users/{user}/edit',[\App\Http\Controllers\UserController::class, 'edit'])
    ->name('users.edit');

Route::patch('/users/{user}',[\App\Http\Controllers\UserController::class, 'update'])
    ->name('users.update');

Route::get('/users/{user}/delete', [\App\Http\Controllers\UserController::class, 'delete'])
    ->name('users.delete');

Route::delete('/users/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])
    ->name('users.destroy');

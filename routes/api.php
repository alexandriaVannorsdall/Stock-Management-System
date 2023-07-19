<?php

use App\Http\Controllers\Api\InventoryController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/inventories', [InventoryController::class, 'index']);

Route::get('/inventories/{inventory}', [InventoryController::class, 'show']);

Route::post('/inventories', [InventoryController::class, 'store']);

Route::patch('/inventories/{inventory}',[InventoryController::class, 'update']);

Route::delete('/inventories/{inventory}', [InventoryController::class, 'delete']);

Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{user}', [UserController::class, 'show']);

Route::post('/users', [UserController::class, 'store']);

Route::patch('/users/{user}',[UserController::class, 'update']);

Route::delete('/users/{user}', [UserController::class, 'delete']);


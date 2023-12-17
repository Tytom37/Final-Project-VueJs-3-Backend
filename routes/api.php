<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Game
Route::post('/games/{gameId}/purchase/{customerId}', [GameController::class, 'purchase']);
Route::get('/games/{game}/image', [GameController::class, 'getImage']);
Route::get('/games/{game}', [GameController::class, 'show']);
Route::put('/games/{game}', [GameController::class, 'update']);
Route::delete('/games/{game}', [GameController::class, 'destroy']);
Route::get('/games', [GameController::class, 'index']);
Route::post('/games', [GameController::class, 'store']);

//Customer
Route::get('/customers/{customer}', [CustomerController::class, 'show']);
Route::put('/customers/{customer}', [CUstomerController::class, 'update']);
Route::delete('/customers/{customer}', [CustomerController::class, 'destroy']);
Route::get('/customers', [CustomerController::class, 'index']);
Route::post('/customers', [CustomerController::class, 'store']);

//Inventory
Route::get('/inventorys/{inventory}', [InventoryController::class, 'show']);
Route::put('/inventorys/{inventory}', [InventoryController::class, 'update']);
Route::delete('/inventorys/{inventory}', [InventoryController::class, 'destroy']);
Route::get('/inventorys', [InventoryController::class, 'index']);
Route::post('/inventorys', [InventoryController::class, 'store']);
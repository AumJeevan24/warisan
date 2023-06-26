<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WarisanDataController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route for fetching all items
Route::get('/warisans', [WarisanDataController::class, 'index']);

// Route for fetching a specific item by ID
Route::get('/warisans/{id}', [WarisanDataController::class, 'show']);

// Route for creating a new item
Route::post('/warisans', [WarisanDataController::class, 'store']);

// Route for updating an item
Route::put('/warisans/{id}', [WarisanDataController::class, 'update']);

// Route for deleting an item
Route::delete('/warisans/{id}', [WarisanDataController::class, 'destroy']);

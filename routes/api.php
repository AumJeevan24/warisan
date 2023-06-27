<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WarisanDataController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Warisan Data Routes
Route::resource('warisan', WarisanDataController::class);

// Additional routes can be added for other resources here


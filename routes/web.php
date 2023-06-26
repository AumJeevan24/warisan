<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WarisanDataController;

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
    return view('welcome');
});

// Route for fetching all items
Route::get('/warisan_data', [WarisanDataController::class, 'index']);

// Route for displaying the update form
Route::get('/warisan_data/{id}/edit', [WarisanDataController::class, 'edit'])->name('warisan.edit');

// Route for updating an item (submitting the update form)
Route::put('/{id}', [WarisanDataController::class, 'update'])->name('warisan.update');



// Route to delete item
Route::get('/{id}/delete',  [WarisanDataController::class, 'delete'])->name('warisan.delete');

// Route to create item
Route::get('/create',  [WarisanDataController::class, 'create'])->name('warisan.create');

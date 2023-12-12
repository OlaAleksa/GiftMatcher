<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\CategoryController;

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

Auth::routes(['register' => false]);

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::resource('gifts', GiftController::class)
    ->names([
        'index' => 'gifts'
]);

Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');

Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
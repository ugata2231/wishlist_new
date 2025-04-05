<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WishesController;

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
    return view('auth.login');
});

Route::get('/dashboard', [WishesController::class, 'index'])->middleware(['auth'])->name('index');

Route::middleware('auth')->group(function () {
    Route::resource('wishes', WishesController::class);
});

require __DIR__.'/auth.php';

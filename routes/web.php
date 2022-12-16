<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\DashboardController;
use \App\Http\Controllers\ChatController;
use \App\Http\Controllers\ProfileController;

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

Route::get('/shrek', function () {
    return view('shrek');
})->name('shrek');

Route::prefix('chats')->middleware('auth')->group(function() {
    Route::get('/', [ChatController::class, 'index'])->name('chats.index');
    Route::get('/{pair_id}', [ChatController::class, 'show'])->name('chats.show');
});

Route::prefix('profile')->middleware('auth')->group(function() {
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

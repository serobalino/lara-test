<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;

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
})->name('welcome');

Route::get('auth', [\App\Http\Controllers\MicrosoftController::class,'redirect'])->name('auth-ms');
Route::get('success', [\App\Http\Controllers\MicrosoftController::class,'login']);

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('generar',\App\Http\Controllers\RegistrosController::class);
    Route::resource('chat',\App\Http\Controllers\ChatController::class);
});

require __DIR__.'/auth.php';

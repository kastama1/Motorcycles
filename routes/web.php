<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MotorcyclesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\LanguageController;

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

Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contacts'])->name('contact');

Route::get('/lang/{locale}', [LanguageController::class, 'index'])->name('lang');

Route::resource('/motorcycles', MotorcyclesController::class)->middleware('auth')->only(['create', 'store', 'update', 'edit', 'destroy']);
Route::post('/motorcycles/delete-image', [MotorcyclesController::class, 'deleteImage']);
Route::resource('/motorcycles', MotorcyclesController::class)->only(['show', 'index']);

Route::resource('/users', UsersController::class)->middleware('auth');

require __DIR__.'/auth.php';
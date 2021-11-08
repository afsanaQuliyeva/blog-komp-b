<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [BaseController::class, 'index'])->name('main');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [BaseController::class, 'showDashboard'])->name('dashboard');

Route::resource('categories', CategoryController::class);

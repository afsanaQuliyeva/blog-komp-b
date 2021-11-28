<?php

use App\Http\Controllers\ArticleController;
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

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::get('/', [BaseController::class, 'index'])->name('main');
    Route::get('/dashboard', [BaseController::class, 'showDashboard'])->name('dashboard');
    Route::get('categories/trash', [CategoryController::class, 'showTrash'])->name('categories.trash');
    Route::get('categories/restore/{id}', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::resource('categories', CategoryController::class);
    Route::get('categories/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
    Route::resource('articles' , ArticleController::class);
});




<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cartsController;
use App\Http\Controllers\articlesController;
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

Route::get('/admin', [articlesController::class, 'index2'])->middleware(['auth'])->name('admin');


Route::get('/', [articlesController::class, 'index']);

Route::get('/cart', [cartsController::class, 'index'])->middleware(['auth'])->name('cart');

Route::post('cart/delete/{id}', [cartsController::class, 'delete'])->middleware(['auth']);

Route::post('article/add/{article_id}', [cartsController::class, 'add'])->middleware(['auth']);

Route::get('cart/checkout/{id}/{total}', [cartsController::class, 'checkout'])->middleware(['auth']);

Route::get('article/{id}', [articlesController::class, 'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/admin/home', [articlesController::class, 'index2'])->middleware(['auth'])->name('adminhome');

Route::post('/admin/edit/{id}', [articlesController::class, 'update'])->middleware(['auth']);

Route::get('/admin/edit/{id}', [articlesController::class, 'edit'])->middleware(['auth'])->name('edit');

Route::post('/admin/create', [articlesController::class, 'store'])->middleware(['auth']);

Route::get('/admin/create', [articlesController::class, 'create'])->middleware(['auth'])->name('create');

Route::post('/admin/delete/{id}', [articlesController::class, 'destroy'])->middleware(['auth'])->name('destroy');
Route::post('/admin/{id}', [articlesController::class, 'update'])->middleware(['auth']);

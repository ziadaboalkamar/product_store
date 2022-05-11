<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StoreController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\InvoiceController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/stores',[StoreController::class,'index'])->name('admin.stores');
    Route::get('/stores/create',[StoreController::class,'create'])->name('stores.create');
    Route::post('/stores/store',[StoreController::class,'store'])->name('stores.store');
    Route::get('/stores/edit/{id}',[StoreController::class,'edit'])->name('stores.edit');
    Route::post('/stores/update/{id}',[StoreController::class,'update'])->name('stores.update');
    Route::post('/stores/delete/{id}',[StoreController::class,'delete'])->name('stores.delete');
    Route::get('/product',[ProductController::class,'index'])->name('admin.product');
    Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
    Route::post('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
    Route::post('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');


});

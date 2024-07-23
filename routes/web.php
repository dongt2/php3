<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ThongtinsvController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return "trang chu";
//});


Route::get('test', function () {
    return view('admin.product.list-product');
});

Route::prefix('product')
    ->as('product.')
    ->group(function (){

    Route::get('/',[ProductController::class,'index'])->name('product');

    Route::get('create',[ProductController::class,'create'])->name('create');
    Route::post('store',[ProductController::class,'store'])->name('store');

    Route::get('show/{id}',         [ProductController::class, 'show'])->name('show');

    Route::get('{id}/edit',         [ProductController::class, 'edit'])->name('edit');
    Route::post('update',       [ProductController::class, 'update'])->name('update');

    Route::get('{id}/destroy',      [ProductController::class, 'destroy'])->name('destroy');
});




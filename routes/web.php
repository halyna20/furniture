<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\GroupController as AdminGroupController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\ProductController;

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

Route::get('/', [ProductController::class, 'index']
)->name('main');

Route::get('/admin', function () {
    return redirect()->action([AdminProductController::class, 'index']);
});

Route::get('/group/{group}', [ProductController::class, 'index'])->name('productByGroup');

Route::prefix('admin')->group(function() {
    Route::resource('/product', AdminProductController::class)->names(['index' => 'admin-product.index',
                                                                'create' => 'admin-product.create',
                                                                'store' => 'admin-product.store',
                                                                'show' => 'admin-product.show',
                                                                'edit' => 'admin-product.edit',
                                                                'update' => 'admin-product.update',
                                                                'destroy' => 'admin-product.destroy']);
    Route::resource('/group', AdminGroupController::class);
});

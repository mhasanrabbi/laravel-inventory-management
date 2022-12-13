<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\Pos\SupplierController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\ProductController;
use App\Http\Controllers\Pos\UnitController;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(DemoController::class)->group(function () {
    Route::get('/about', 'Index')->name('about.page')->middleware('check');
    Route::get('/contact', 'ContactMethod')->name('cotact.page');
});


// Admin All Route
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');

    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');
});

// Supplier Route
Route::controller(SupplierController::class)->group(function () {
    Route::get('/supplier', 'index')->name('supplier.all');
    Route::get('/supplier/create', 'create')->name('supplier.create');
    Route::post('/supplier/store', 'store')->name('supplier.store');
    Route::get('/supplier/edit/{id}', 'edit')->name('supplier.edit');
    Route::put('/supplier/update', 'update')->name('supplier.update');
    Route::get('/supplier/delete/{id}', 'destroy')->name('supplier.delete');
});

// Customer Route
Route::controller(CustomerController::class)->group(function () {
    Route::get('/customer', 'index')->name('customer.all');
    Route::get('/customer/create', 'create')->name('customer.create');
    Route::post('/customer/store', 'store')->name('customer.store');
    Route::get('/customer/edit/{id}', 'edit')->name('customer.edit');
    Route::put('/customer/update', 'update')->name('customer.update');
    Route::get('/customer/delete/{id}', 'destroy')->name('customer.delete');
});

// Unit Route
Route::controller(UnitController::class)->group(function () {
    Route::get('/unit', 'index')->name('unit.all');
    Route::get('/unit/create', 'create')->name('unit.create');
    Route::post('/unit/store', 'store')->name('unit.store');
    Route::get('/unit/edit/{id}', 'edit')->name('unit.edit');
    Route::put('/unit/update', 'update')->name('unit.update');
    Route::get('/unit/delete/{id}', 'destroy')->name('unit.delete');
});

// Category Route
Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'index')->name('category.all');
    Route::get('/category/create', 'create')->name('category.create');
    Route::post('/category/store', 'store')->name('category.store');
    Route::get('/category/edit/{id}', 'edit')->name('category.edit');
    Route::put('/category/update', 'update')->name('category.update');
    Route::get('/category/delete/{id}', 'destroy')->name('category.delete');
});

// Product Route
Route::controller(ProductController::class)->group(function () {
    Route::get('/product', 'index')->name('product.all');
    Route::get('/product/create', 'create')->name('product.create');
    Route::post('/product/store', 'store')->name('product.store');
    Route::get('/product/edit/{id}', 'edit')->name('product.edit');
    Route::put('/product/update', 'update')->name('product.update');
    Route::get('/product/delete/{id}', 'destroy')->name('product.delete');
});


Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';


// Route::get('/contact', function () {
//     return view('contact');
// });
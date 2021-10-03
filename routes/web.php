<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UnitController;

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

Route::get('/login', function() {
    return redirect()->route('admin.login');
});

Route::get('/register', function() {
    return redirect()->route('admin.login');
});

Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function(){
    Route::get('/login',[AdminController::class, 'loginForm']);   
    Route::post('/login',[AdminController::class, 'store'])->name('admin.login');   

});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard');


//admin all route
Route::get('admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');
Route::get('admin/profile',[AdminProfileController::class, 'adminProfile'])->name('admin.profile');
Route::get('admin/profile/edit',[AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile_edit');
Route::post('admin/profile/store',[AdminProfileController::class, 'adminProfileStore'])->name('admin.profile.store');
Route::post('admin/change/password',[AdminProfileController::class, 'UpdateChangePassword'])->name('update.change.password');

// admin brand route
Route::prefix('brands')->group(function(){
    Route::resource('brand',BrandController::class);
    Route::get('/delete/{id}',[BrandController::class, 'softDelete'])->name('brand.delete');
  });

// admin categories route
Route::prefix('categories')->group(function(){
    Route::resource('category',CategoryController::class);
    Route::get('/delete/{id}',[CategoryController::class, 'softDelete'])->name('category.delete');
});

// admin Supplier route
Route::prefix('suppliers')->group(function(){
    Route::resource('supplier',SupplierController::class);
    Route::get('/delete/{id}',[SupplierController::class, 'softDelete'])->name('supplier.delete');
});

// admin Product route
Route::prefix('products')->group(function(){
    Route::resource('product',ProductController::class);
    Route::get('/delete/{id}',[ProductController::class, 'softDelete'])->name('product.delete');
   

    Route::resource('unit',UnitController::class);
    Route::get('unit/delete/{id}',[UnitController::class, 'softDelete'])->name('unit.delete');
});


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

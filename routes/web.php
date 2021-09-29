<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;

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

// admin brand all route
Route::prefix('brands')->group(function(){
    Route::resource('brand',BrandController::class);
    Route::get('/delete/{id}',[BrandController::class, 'softDelete'])->name('brand.delete');
  });

// admin categories all route
Route::prefix('categories')->group(function(){
    Route::resource('category',CategoryController::class);
    Route::get('/delete/{id}',[CategoryController::class, 'softDelete'])->name('category.delete');
  });


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InmuebleController;
use App\Http\Controllers\Admin\Dashboard;

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



Route::get('/', function () { return view('welcome');})->name('welcome');

Route::get('categorias/{category}', [InmuebleController::class, 'category'])->name('inmuebles.category');
Route::get('i/{inmueble}', [InmuebleController::class, 'detail'])->name('inmuebles.detail');


//Admin Routes

Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->group(function () {
    Route::get('', [Dashboard::class, 'index'] )->name('admin.inicio');
    //Route::get('users', [Dashboard::class, 'users'] )->name('admin.users');
    //Route::get('categories', [Dashboard::class, 'categories'] )->name('admin.categories');
    //Route::get('roles', [Dashboard::class, 'roles'] )->name('admin.roles');
    //Route::get('inmuebles', [Dashboard::class, 'inmuebles'] )->name('admin.inmuebles');


});









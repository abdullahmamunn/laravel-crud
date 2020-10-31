<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/home', [App\Http\Controllers\ProductController::class, 'create'])->name('home');
Route::get('/home', [App\Http\Controllers\ProductController::class, 'show']);
Route::get('/home/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('edit');
Route::post('/home/{update_id}', [App\Http\Controllers\ProductController::class, 'update'])->name('update-data');
Route::get('/home/delete/{delete_id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('delete');


<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\kpController;
use App\Http\Controllers\mahasiswaController;
use App\Http\Controllers\tempatkpController;

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

// Auth::routes();
// Route::group(['middleware' => 'auth'], function(){
//     Route::get('/', [MerchController::class, 'index'])->name('merch.index');
// });

Route::get('/', [kpController::class, 'index'])->name('kp.index');
Route::get('add', [kpController::class, 'create'])->name('kp.create'); 
Route::post('store', [kpController::class, 'store'])->name('kp.store');
Route::get('edit/{id}', [kpController::class, 'edit'])->name('kp.edit'); 
Route::post('update/{id}', [kpController::class,  'update'])->name('kp.update');
Route::post('delete/{id}', [kpController::class,  'delete'])->name('kp.delete');
Route::post('softdelete/{id}', [kpController::class,  'softDelete'])->name('kp.softDelete');
Route::get('restore', [kpController::class,  'restore'])->name('kp.restore');

Route::get('mahasiswa/add', [mahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('mahasiswa/store', [mahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('mahasiswa/edit/{id}', [mahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::post('mahasiswa/update/{id}', [mahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::post('mahasiswa/delete/{id}', [mahasiswaController::class, 'delete'])->name('mahasiswa.delete');

Route::get('tempatkp/add', [tempatkpController::class, 'create'])->name('tempatkp.create');
Route::post('tempatkp/store', [tempatkpController::class, 'store'])->name('tempatkp.store');
Route::get('tempatkp/edit/{id}', [tempatkpController::class, 'edit'])->name('tempatkp.edit');
Route::post('tempatkp/update/{id}', [tempatkpController::class, 'update'])->name('tempatkp.update');
Route::post('tempatkp/delete/{id}', [tempatkpController::class, 'delete'])->name('tempatkp.delete');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


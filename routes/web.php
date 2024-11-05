<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LocationController;

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

Route::get('/', function () { return view('welcome');});
Route::get('/layout', function () { return view('layout');});
Route::get('/member', [AdminController::class, 'users_search'])->name('users_search');

Route::get('/add', function () { return view('add');})->name('add_user');
Route::post('/add', [AdminController::class, 'add_user'])->name('add');

Route::get('/LocationTest', [LocationController::class, 'getProvince']);
Route::post('/getAmphoe/{id}', [LocationController::class, 'getAmphoe']);

Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('delete');
Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm']);
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');




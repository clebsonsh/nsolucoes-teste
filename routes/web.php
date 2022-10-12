<?php

use App\Http\Controllers\HomeControler;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeControler::class)->name('home.index');

Route::post('login', [SessionsController::class, 'store'])
  ->middleware('guest')
  ->name('login');

Route::post('logout', [SessionsController::class, 'destroy'])
  ->middleware('auth')
  ->name('logout');

Route::resource('users', UserController::class)->only(['index', 'store', 'update', 'destroy'])
  ->middleware('auth');

<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Frontend\WebsiteController;
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

Route::get('/', [WebsiteController::class, 'index'])->name('index');
Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/userLogin', [AuthenticationController::class, 'userLogin'])->name('userLogin');
Route::get('/register', [AuthenticationController::class, 'register'])->name('register');
Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');
Route::resource('users', UserController::class);
Route::get('/admin', [DashboardController::class, 'admin'])->name('admin');

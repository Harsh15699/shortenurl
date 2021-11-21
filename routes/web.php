<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;

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
Route::get('/', [Controller::class, 'index'])->name('index');
Route::get('/shorturl', [Controller::class, 'landingPage'])->name('landingPage');
Route::post('/saveUrl', [Controller::class, 'saveUrl'])->name('saveUrl');
Route::get('/su/{keyword}', [Controller::class, 'findActualUrl'])->name('actualUrl');
Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('adminLogin');
Route::post('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/signup', [Controller::class, 'signup'])->name('signup');
Route::post('/signup', [Controller::class, 'saveUser'])->name('saveUser');
Route::get('/login', [Controller::class, 'login'])->name('login');
Route::post('/login', [Controller::class, 'checkUser'])->name('checkUser');
Route::get('/user-dashboard', [Controller::class, 'userDashboard'])->name('userDashboard');
Route::get('/admin/dashboard', [AdminController::class, 'getDashboard'])->name('getDashboard');

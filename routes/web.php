<?php

use App\Http\Controllers\Auth\AuthContoller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanBukuController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PengarangController;

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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login',  [AuthContoller::class, 'showFormLogin']);
Route::get('/register', [AuthContoller::class, 'showFormRegister']);


Route::post('/login', [AuthContoller::class, 'login'])->name('login')->middleware("throttle:3,1");
Route::post('/register', [AuthContoller::class, 'register'])->name('register');

Route::get('/user', [UserController::class, 'index'])->name('users.index');
Route::post('user/destroy/{id}', [UserController::class, 'destroy']);
Route::post('user/resetpass/{id}', [UserController::class, 'resetPass']); 

Route::get('/dashboard', [UserController::class, 'dashboard']); 

Route::get('/signout', [AuthContoller::class, 'signOut'])->name('signout');

Route::get('/reload-captcha', [AuthContoller::class, 'reloadCaptcha']);

Route::resource('buku',BukuController::class);
Route::resource('peminjaman-buku', PeminjamanBukuController::class);
Route::resource('penerbit]',PenerbitController::class);
Route::resource('pengarang',PengarangController::class);


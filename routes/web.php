<?php

use App\Http\Controllers\Back\AuthController;
use App\Http\Controllers\Back\Ayarlar;
use App\Http\Controllers\Back\Profil;
use App\Http\Controllers\Back\Kompleks;
use App\Http\Controllers\Back\Bina;
use App\Http\Controllers\Back\Menzil;
use App\Http\Controllers\Back\Order;
use App\Http\Controllers\Back\Menzil_sah;
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
Route::prefix('admin')->name('admin.')->middleware('isLogin','isRole')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('postlogin');
});

Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function () {
    Route::name('dashboard')->get('/', function () {
    return view('back.dashboard');
    });
    Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');
    //Ayarlar
    Route::resource('/ayarlar',Ayarlar::class);
    //Profil
    Route::resource('/profil',Profil::class);
    Route::get('/delete/{id}', [Profil::class, 'delete'])->name('delete');
     //Kompleks
     Route::resource('/kompleks',Kompleks::class);
     Route::get('/deletekompleks/{id}', [Kompleks::class, 'delete'])->name('delete.kompleks');
     //Bina
     Route::resource('/bina',Bina::class);
     Route::get('/deletebina/{id}', [Bina::class, 'delete'])->name('delete.bina');
     //Menzil
     Route::resource('/menzil',Menzil::class);
     Route::get('/deletemenzil/{id}', [Menzil::class, 'delete'])->name('delete.menzil');
     //Menzil sahibi
     Route::resource('/menzil_sah',Menzil_sah::class);
     Route::get('/deletemenzil_sah/{id}', [Menzil_sah::class, 'delete'])->name('delete.menzil_sah');

     //Order
     Route::resource('/order',Order::class);
    
});



Route::get('/error',function(){
    return view('error');
});

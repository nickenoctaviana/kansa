<?php

use App\Http\Controllers\BodyController;
use App\Http\Controllers\TiketController;
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
    return view('welcome');
});

//kansa
//Route::get('/login',[BodyController::class, 'kansalogin']);
//Route::get('/transaksi',[TiketController::class, 'kansatransaksi']);
//Route::get('/bkasir',[BodyController::class, 'kansaberandakasir']);
//Route::get('/transaksi2',[BodyController::class, 'kansatransaksi2']);
//Route::get('/test',[BodyController::class, 'test']);
//Route::get('/riwayat',[BodyController::class,'kansariwayat']);

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//  return view('dashboard');
//Route::get('/kasir',[BodyController::class,'index'])->name('kasir');
//})->name('dashboard');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    //transaksi
    Route::get('/transaksi', [BodyController::class, 'index'])->name('transaksi');
    Route::get('/detail/{no_order}', [BodyController::class, 'detailtransaksi'])->name('detailtransaksi');
    //riwayat
    Route::get('/riwayat', [BodyController::class, 'riwayat'])->name('invoice');
    Route::get('/filterriwayat/periode', [BodyController::class, 'periode']);
    //laporan keuangan
    Route::get('/laporan', [BodyController::class, 'keuangan'])->name('laporan');
    //role
    Route::get('redirects','App\Http\Controllers\BodyController@role');
});


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\test1Controller;
use App\Http\Controllers\siswaController;

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

// metode tanpa controller langsung mengarah ke view
Route::get('/test', function () {
    return view('test');   
});

// metode tanpa view
Route::get('/test1', function () {
    return 'hello vlog';   
});     

// metode dengan menggunakan dengan controller
Route::get('/test2', [test1Controller::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->prefix('siswa')->group(function () {
    Route::get('/', [siswaController::class, 'index'])->name('siswa');
    Route::get('/print/success',[siswaController::class, 'exportPDF'])->name('siswa.pdf');
    Route::post('/create/success',[siswaController::class, 'store'])->name('siswa.store');
    Route::get('/delete/success/{id}',[siswaController::class, 'destroy'])->name('siswa.delete');
    Route::put('/update/success/{id}', [siswaController::class, 'update'])->name('siswa.update');
    Route::get('/edit/success/{id}', [siswaController::class, 'detail'])->name('siswa.detail');
});
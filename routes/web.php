<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('job.index');
});

Route::middleware(['auth','role:admin'])->name('admin.')->prefix('admin')->group(function() {
    Route::get('/', function () {
        return view('admin.index');
    });
});

Route::middleware(['auth','role:fournisseur'])->name('fournisseur.')->prefix('is-admin')->group(function() {
    Route::get('/', function () {
        return view('fournisseur.index');
    });
});

Route::middleware(['auth','role:user'])->name('user.')->prefix('user')->group(function() {
    Route::get('/', function () {
        return view('user.index');
    });
});

// Auth Controller
Route::get("login" , [AuthController::class,'login_form'])->name('login_form');
Route::get("register" , [AuthController::class,'register_form'])->name('register_form');

Route::post("login_c" , [AuthController::class,'login'])->name('login');
Route::post("register_c" , [AuthController::class,'register'])->name('register');
Route::post("logout" , [AuthController::class,'logout'])->name('logout');
//end Auth Controller

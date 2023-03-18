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
    return view('welcome');
});


// Auth Controller
Route::get("login" , [AuthController::class,'login_form'])->name('login_form');
Route::get("register" , [AuthController::class,'register_form'])->name('register_form');

Route::post("login_c" , [AuthController::class,'login'])->name('login');
Route::post("register_c" , [AuthController::class,'register'])->name('register');
Route::post("logout" , [AuthController::class,'logout'])->name('logout');
//end Auth Controller

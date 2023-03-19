<?php

use App\Http\Controllers\admin\HomeController;
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
    Route::controller(HomeController::class)->group(function() {

        Route::get("categories" , 'Categorieslist' )->name("categories");
        Route::get("users" ,  'Users_list')->name("userslist");
        Route::get('view_user/{id}',  'view_user')->name('user_info');
        Route::post('assign_role_to_user/{id}',  'assign_role_to_user')->name('assign_role_to_user');
        Route::delete('remove_role_from_user/{id}',  'remove_role_from_user')->name('remove_role_from_user');
        Route::post('assign_permission_to_user/{id}',  'assign_permission_to_user')->name('assign_permission_to_user');
        Route::delete('remove_permission_from_user/{id}',  'remove_permission_from_user')->name('remove_permission_from_user');
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
Route::get("login" , [AuthController::class,'login_form'])->name('login');
Route::get("register" , [AuthController::class,'register_form'])->name('register');

Route::post("login_c" , [AuthController::class,'login'])->name('login_c');
Route::post("register_c" , [AuthController::class,'register'])->name('register_c');
Route::post("logout" , [AuthController::class,'logout'])->name('logout');
//end Auth Controller

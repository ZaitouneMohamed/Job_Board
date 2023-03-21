<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\fournisseur\HomeController as FournisseurHomeController;
use App\Http\Controllers\job\HomeController as JobHomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\user\homeController as UserHomeController;
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

Route::get('lang', [LangController::class,'change'])->name('changeLang');
Route::get('job_detail/{id}', [JobHomeController::class , 'job_details'] )->name('job_detail');
Route::get('job_search', [JobHomeController::class , 'search'] )->name('job.search');


Route::middleware(['auth','role:admin','active'])->name('admin.')->prefix('admin')->group(function() {
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
        Route::get("annonces_list" ,  'annonces_list')->name("annonces_list");
    });
});

Route::middleware(['auth','role:fournisseur','active'])->name('fournisseur.')->prefix('is-admin')->group(function() {
    Route::get('/', function () {
        return view('fournisseur.index');
    });
    Route::get('/company', function () {
        return view('fournisseur.company');
    })->name('company');
    Route::get('/mes-annonces', function () {
        return view('fournisseur.annonces.index');
    })->name('annonces.index');
    Route::get('/user_on_annonce/{id}' , [FournisseurHomeController::class , 'users_pending_on_job' ])->name('user_on_annonce');

});

Route::middleware(['auth','role:user','active'])->name('user.')->prefix('user')->group(function() {
    Route::get('/', function () {
        return view('user.index');
    });
    Route::controller(UserHomeController::class)->group(function() {
        Route::get('profile' , 'profile')->name('profile');
        Route::get('pending_jobs' , 'my_pending_jobs')->name('pending_jobs');
        Route::get('favorites_jobs' , 'my_favorites_jobs')->name('favorites_jobs');
        Route::get('edit_profile' , 'edit_profile')->name('profile.edit');
        Route::post('update_profile' , 'update_profile')->name('profile.update');
        Route::get('apply_job/{user_id}/{job_id}/apply_for_job' , 'apply_job')->name('apply_job');
    });
});

// Auth Controller
Route::get("login" , [AuthController::class,'login_form'])->name('login');
Route::get("register" , [AuthController::class,'register_form'])->name('register');

Route::post("login_c" , [AuthController::class,'login'])->name('login_c');
Route::post("register_c" , [AuthController::class,'register'])->name('register_c');
Route::post("logout" , [AuthController::class,'logout'])->name('logout');
//end Auth Controller

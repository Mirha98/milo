<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeaveApplicationController;
use App\Http\Controllers\UserController;
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

Route::get('/',[HomeController::class,'index'])->name('home.index');

Route::prefix('/admin')->middleware(['auth','isAdmin','PreventBack'])->group(function(){
    Route::get('/dashboard',[AdminController::class,'index'])->name('admin.index');
    Route::get('/userlist',[AdminController::class,'userlist'])->name('admin.userlist');
    Route::get('/fetchall',[AdminController::class,'fetchall'])->name('admin.fetchall');
    Route::get('/view-application',[AdminController::class,'view_leave_application'])->name('admin.view_leave_application');
    ROute::get('/view-leave-application',[AdminController::class,'view_leave_application_id'])->name('admin.view_leave_application_id');
});

Route::prefix('/user')->middleware(['auth','PreventBack'])->group(function(){
    Route::get('/',[UserController::class,'index'])->name('user.index');
    Route::get('/view-user',[UserController::class,'view_user'])->name('user.view');
    Route::get('/leave-category',[UserController::class,'leave_category'])->name('user.leave_category');
});
Route::post('/register-user',[AuthController::class,'register'])->name('user.register');
Route::post('/logout-user',[AuthController::class,'logout'])->name('user.logout');
Route::post('/login-user',[AuthController::class,'login'])->name('user.login');

Route::post('/leave-application',[LeaveApplicationController::class,'store'])->name('leave.store');
Route::get('/application-listing',[LeaveApplicationController::class,'application_listing'])->name('leave.application_list');
Route::get('/application-listing-all',[LeaveApplicationController::class,'application_listing_all'])->name('leave.all');
Route::get('/view-application-user',[LeaveApplicationController::class,'view_application_user'])->name('leave.application_user');
Route::post('/leave-status',[LeaveApplicationController::class,'leave_status'])->name('leave.status');


Route::get('/try', function(){
    return view('user.application_listing');
});


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\UserController;
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

Auth::routes();

// Route::group(['as'=>'admin.','prefix'=>'admin','namespace' => 'Admin','middleware'=>['auth','admin'] ],function(){
    
//     Route::get('dashboard',[App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');

// });

//access to only admin
Route::get('dashboard',[App\Http\Controllers\AdminController::class, 'index'])->name('dashboard')->middleware('auth','admin');
Route::resource('user', UserController::class)->middleware('admin');

//access to supervisor and admin
//Route::post('accept/{id}',VendorController::class,'accept');
Route::get('home',function(){
    return view('home');
})->name('home')->middleware('auth');
Route::get('rejected',[VendorController::class,'rejected'])->name('rejected')->middleware('auth');
Route::get('accepted',[VendorController::class,'accepted'])->name('accepted')->middleware('auth');

Route::get('checkOTP/$request',[VendorController::class,'checkOTP'])->name('checkOTP');
Route::get('/vendor/verify-email/{verification_code}',[VendorController::class,'verify_email'])->name('verify_email');

//access to all
Route::get('registeration',[VendorController::class,'registeration'])->name('registeration');
Route::resource('vendor', VendorController::class);
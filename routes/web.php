<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\HomeSlideController;
use App\Http\Controllers\ProfileController;
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
    return view('frontend.index');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Admin Controller


Route::controller(AdminController::class)->group(function(){


    Route::get('admin/logout', 'destroy')->name('admin.logout');
    Route::get('admin/profile', 'profile')->name('admin.profile');
    Route::get('edit/profile', 'edit')->name('edit.profile');
    Route::post('update/profile', 'update')->name('update.profile');
    Route::get('change/password', 'changePassword')->name('change.password');
    Route::post('update/password', 'updatePassword')->name('update.password');



});


Route::controller(HomeSlideController::class)->group(function(){


    Route::get('home/slider', 'HomeSlide')->name('home.slider');
    Route::get('add/slider', 'AddHomeSlide')->name('add.slider');
    Route::post('store/slider', 'StoreHomeSlide')->name('store.slider');
    Route::get('edit/slider/{id}', 'EditHomeSlide')->name('edit.slider');
    Route::post('update/slider/{id}', 'UpdateHomeSlide')->name('update.slider');
   



});


//End Admin Controller

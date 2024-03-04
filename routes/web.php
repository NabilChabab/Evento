<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\organizer\OrganizerController;
use App\Http\Controllers\spectator\HomeController;
use App\Http\Controllers\StripePaymentController;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
});

Auth::routes();
Route::get('authentication' , function(){
    return view('authentication');
})->name('authentication');

Route::get('organizer_auth' , [RegisterController::class , 'organizer_auth'])->name('organizer_auth');
Route::post('organizer' , [RegisterController::class , 'organizer'])->name('organizer.post');
Route::post('register' , [RegisterController::class , 'register'])->name('register.post');



Route::prefix('admin')->middleware(['auth' , 'role:admin'])->group(function(){
    Route::resource('dashboard' , AdminController::class);
    Route::resource('categories' , CategoryController::class);
    Route::resource('users' , UserController::class);
    Route::resource('events' , EventController::class);
});

Route::prefix('organizer')->middleware(['auth' , 'role:organizer'])->group(function(){
    Route::resource('account' , OrganizerController::class);

});

Route::prefix('user')->middleware(['auth' , 'role:spectator'])->group(function(){
    Route::resource('home' , HomeController::class);


});

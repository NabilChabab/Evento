<?php

use App\Http\Controllers\MollieController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\organizer\EventsController;
use App\Http\Controllers\organizer\OrganizerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\spectator\HomeController;
use App\Models\Event;
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
    $events = Event::where('event_status', 'accepted')->get();
    return view('home', compact('events'));
});

Auth::routes();
Route::get('authentication', function () {
    return view('authentication');
})->name('authentication');

Route::get('organizer_auth', [RegisterController::class, 'organizer_auth'])->name('organizer_auth');
Route::post('organizer', [RegisterController::class, 'organizer'])->name('organizer.post');
Route::post('register', [RegisterController::class, 'register'])->name('register.post');


Route::get('profile', [ProfileController::class, 'profile'])->name('admin.profile');
Route::put('user-update', [ProfileController::class, 'updateProfile'])->name('user.update');



Route::prefix('evento')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('dashboard', AdminController::class);
    Route::resource('categories', CategoryController::class);
    Route::put('/users/{id}/update-status', [UserController::class, 'updateStatus'])->name('users.update-status');
    Route::resource('users', UserController::class);
    Route::put('/events/{id}/update-status', [EventController::class, 'updateEventsStatus'])->name('events.update-status');
    Route::resource('events', EventController::class);
});

Route::prefix('evento-org')->middleware(['auth', 'role:organizer'])->group(function () {
    Route::get('booking' , [OrganizerController::class , 'booking'])->name('booking.index');
    Route::resource('account', OrganizerController::class);
    Route::resource('event', EventsController::class);
});

Route::prefix('user')->middleware(['auth', 'role:spectator'])->group(function () {
    Route::resource('home', HomeController::class);
    Route::get('reservation/{id}' , [HomeController::class , 'checkout'])->name('checkout-booking');
    Route::post('reservation' , [HomeController::class , 'makeReservation'])->name('reservation.store');
});


Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');

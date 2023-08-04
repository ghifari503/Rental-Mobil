<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::resource('/cars', App\Http\Controllers\CarController::class);
// Route::get('/show/{id}', [App\Http\Controllers\CarController::class, 'show']);
// Route::get('/api/cars', [App\Http\Controllers\CarController::class, 'api']);

// Route::resource('/bookings', App\Http\Controllers\BookingController::class);
// Route::get('/bookings/data', [App\Http\Controllers\BookingController::class, 'api'])->name('bookings.data');

// Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('/register', 'Auth\RegisterController@register');


Route::get('/', function () {
    return redirect()->route('login');
});



Route::group(['middleware' => ['prevent-back']], function () {
    Auth::routes(['register' => false]);

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');

        Route::adminRoutes();
        Route::customerRoutes();
        Route::carRoutes();
        Route::transactionRoutes();
        Route::profileRoutes();
    });
});
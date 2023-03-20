<?php

use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\PassengerController;
use App\Http\Controllers\HomeController;
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

// index routing via Route feature
Route::redirect('/', '/Horizontal');
//Route::redirect('/', '/Dashboard/index');


/*
|--------------------------------------------------------------------------
| Pages
|--------------------------------------------------------------------------
|
*/

// index routing via Route feature
Route::redirect('/', '/main');


/*
|--------------------------------------------------------------------------
| Pages
|--------------------------------------------------------------------------
|
*/
Route::view('/Horizontal', 'horizontal');
Route::view('/Vertical', 'vertical');

Route::get('/main', [HomeController::class, 'main'])->name('main');
Route::post('/storeEmail', [HomeController::class, 'storeEmail'])->name('storeEmail');
Route::get('/verify', [HomeController::class, 'verify'])->name('verify');
Route::get('/otp', [HomeController::class, 'otp']);
//Route::get('/passenger-info', [HomeController::class, 'passengerInfo']);
Route::get('/phone-number', [HomeController::class, 'phoneNumber']);
Route::post('/phone-number', [HomeController::class, 'storePhoneNumber']);
Route::get('/passenger-info', [HomeController::class, 'passengerInfo'])->name('passenger-info');
Route::post('/passenger-info', [HomeController::class, 'storePassengerInfo']);


Route::prefix('Dashboards')->group(function () {
    Route::post('/add', [AuthController::class, 'login'])->name('add');
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::group(['middleware' => ['auth']], function () {
        //  Route::view('/index', 'pages.dashboard.authentication.login');
        Route::get('/passenger', [PassengerController::class, 'index']);
        Route::get('/passengerDetail/{id}', [PassengerController::class, 'show']);
        Route::view('/sendEmail', 'pages.dashboard.sendEmail');

        Route::get('/logout', [AuthController::class, 'logout'])->name("logout");
    });


});


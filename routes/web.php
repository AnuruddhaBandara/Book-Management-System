<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffAuthController;
use App\Http\Controllers\StaffRegistrationController;
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

Route::get('/login', function () {
    return view('login');
})->name('login');



Route::post('/login', [AuthController::class, 'loginDispatcher']);

//STAFF ROUTES
Route::prefix('/staff')->group(function () {
    Route::post('login', [StaffAuthController::class,'login']);
    Route::post('logout', [StaffAuthController::class,'logout'])->name('staff.logout');
    Route::get('/register', [StaffRegistrationController::class, 'showRegistrationForm'])->name('staff.register');
    Route::post('/register', [StaffRegistrationController::class, 'register']);

});

//READER ROUTES
Route::prefix('reader')->group(function () {
    Route::get('login', 'ReaderAuthController@showLoginForm')->name('reader.login');
    Route::post('login', 'ReaderAuthController@login');
    Route::post('logout', 'ReaderAuthController@logout')->name('reader.logout');
});

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('is_admin');//check when admin loging


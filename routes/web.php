<?php

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

//STAFF ROUTES
Route::prefix('staff')->group(function () {
    Route::get('login', 'StaffAuthController@showLoginForm')->name('staff.login');
    Route::post('login', 'StaffAuthController@login');
    Route::post('logout', 'StaffAuthController@logout')->name('staff.logout');
});

//READER ROUTES
Route::prefix('reader')->group(function () {
    Route::get('login', 'ReaderAuthController@showLoginForm')->name('reader.login');
    Route::post('login', 'ReaderAuthController@login');
    Route::post('logout', 'ReaderAuthController@logout')->name('reader.logout');
});

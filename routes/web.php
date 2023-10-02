<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ReaderAuthController;
use App\Http\Controllers\ReaderController;
use App\Http\Controllers\StaffAuthController;
use App\Http\Controllers\StaffRegistrationController;
use App\Http\Controllers\ReaderRegistrationController;
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
    // Route::post('login', [StaffAuthController::class,'login']);
    Route::get('/logout', [StaffAuthController::class,'logout'])->name('staff.logout');
    Route::get('/register', [StaffRegistrationController::class, 'showRegistrationForm'])->name('staff.register');
    Route::post('/register', [StaffRegistrationController::class, 'register']);
Route::get('', [StaffRegistrationController::class, 'listStaff'])->name('staff.index');


});

//READER ROUTES
Route::prefix('/reader')->group(function () {
    Route::get('/register', [ReaderRegistrationController::class, 'showRegistrationForm'])->name('reader.register');
    Route::post('/register', [ReaderRegistrationController::class, 'register']);
    Route::get('/dashboard', [ReaderController::class, 'dashboard'])->name('reader.dashboard');
    Route::post('/logout', [ReaderAuthController::class, 'logout'])->name('reader.logout');
});

//admin routes
Route::prefix('/admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('is_admin');//check when admin loging
    Route::get('/books/index', [BookController::class, 'index'])->name('admin.books.index');
    Route::get('/books/create', [BookController::class, 'create'])->name('admin.books.create');
    Route::post('/books/store', [BookController::class, 'store'])->name('admin.books.store');
    Route::delete('/books/{id}/delete', [BookController::class, 'destroy'])->name('admin.books.destroy');
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('admin.books.edit');
    Route::put('/books/{id}/update', [BookController::class, 'update'])->name('admin.books.update');
    # Book Borrow
    Route::get('/book/{id}/borrow', [BorrowController::class , 'createBorrowRecord'])->name('admin.books.borrow_book');
    Route::post('/book/borrow', [BorrowController::class , 'store'])->name('admin.book.borrow');
});

Route::get('borrows', [BorrowController::class, 'index'])->name('reader.borrows');


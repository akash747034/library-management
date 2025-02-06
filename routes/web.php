<?php

use App\Http\Controllers\admin\AdminBookController;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\BookRequestController;
use App\Http\Controllers\admin\UserListController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\UserBookController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
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
    return redirect('home');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('/admin', [AdminHomeController::class, 'index'])->name('admin');
        Route::get('users', UserListController::class)->name('users.list');

        Route::get('/admin/books', [AdminBookController::class, 'index'])->name('admin.books');
        Route::get('/admin/books/create', [AdminBookController::class, 'create'])->name('admin-book.create');
        Route::post('/admin/books/store', [AdminBookController::class, 'store'])->name('admin-book.store');

        Route::get('book-issue', [BookRequestController::class, 'bookIssueRequests'])->name('book-issue.requests');
        Route::get('book-return', [BookRequestController::class, 'bookReturnRequests'])->name('book-return.requests');

        Route::post('/admin/book-issue', [BookRequestController::class, 'updateBookIssueRequest'])->name('admin.book-issue');
        Route::post('/admin/book-return', [BookRequestController::class, 'updateBookReturnRequest'])->name('admin.book-return');
    });

    Route::middleware(UserMiddleware::class)->group(function () {
        Route::get('/user', [HomeController::class, 'index'])->name('user');

        Route::get('/user/books', [UserBookController::class, 'index'])->name('user.books');
        Route::get('/user/books-issued', [UserBookController::class, 'booksIssued'])->name('books.issued');

        Route::get('/user/books-issue', [UserBookController::class, 'booksIssueRequests'])->name('books.issue');
        Route::get('/user/books-return', [UserBookController::class, 'booksReturnRequests'])->name('books.return');

        Route::post('user/book-issue', [UserBookController::class, 'bookIssue'])->name('book.issue');
        Route::post('/user/book-return', [UserBookController::class, 'bookReturn'])->name('book.return');
    });
});

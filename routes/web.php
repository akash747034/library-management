<?php

use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\BookRequestController;
use App\Http\Controllers\admin\UserListController;
use App\Http\Controllers\book\BookController;
use App\Http\Controllers\user\HomeController;
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

Route::middleware(['auth'])->group(function(){

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::middleware(AdminMiddleware::class)->group(function(){
        Route::get('users',UserListController::class)->name('users.list');
        Route::get('book-issue',[BookRequestController::class,'index'])->name('book-issue.requests');
        Route::get('/admin', [AdminHomeController::class, 'index'])->name('admin');

    });
   
    Route::middleware(UserMiddleware::class)->group(function(){
        Route::get('/user', [HomeController::class, 'index'])->name('user');
    });

    Route::get('/books',[BookController::class, 'index'])->name('books.index');
   
});


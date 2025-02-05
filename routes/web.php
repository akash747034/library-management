<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\book\BookRquestController;
use App\Http\Controllers\user\UserListController;
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



Route::get('auth-login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('auth-login', [LoginController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function(){
    Route::post('auth-logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('users',UserListController::class)->name('users.list');

    Route::get('book_issuse_requests',[BookRquestController::class,'index'])->name('book_issue.requests');

});


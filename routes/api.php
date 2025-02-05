<?php

use App\Http\Controllers\api\auth\DeleteUserController;
use App\Http\Controllers\api\auth\LoginController;
use App\Http\Controllers\api\auth\LogoutController;
use App\Http\Controllers\api\auth\RegisterController;
use App\Http\Controllers\api\book\BookController;
use App\Http\Controllers\api\book_issue\BookIssueController;
use App\Http\Middleware\FormKeyMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



// Route::middleware(FormKeyMiddleware::class)->group(function () {
//     Route::post("/login", LoginController::class);
//     Route::post("/register", RegisterController::class);
//   });

// Route::middleware(['auth:api'])->group(function () {
//     Route::post('/logout',LogoutController::class);
//     Route::delete('/user',DeleteUserController::class);

//     Route::resource('/books', BookController::class);
//     Route::resource('/book_issues', BookIssueController::class);


// });





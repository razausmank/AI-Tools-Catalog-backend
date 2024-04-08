<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPlatformController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


// protected routes

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/product', [ProductController::class, 'index']);
    Route::post('/product', [ProductController::class, 'store']);
    Route::post('/product/{product}/update', [ProductController::class, 'update']);
    Route::post('/product/{product}/publish', [ProductController::class, 'publish']);
    Route::post('/product/{product}/unpublish', [ProductController::class, 'unpublish']);
    Route::post('/product/{product}/delete', [ProductController::class, 'delete']);


    Route::post('/product/{product}/bookmark', [ProductController::class, 'bookmarkProduct']);
    Route::post('/product/{product}/remove-bookmark', [ProductController::class, 'removeBookmarkOfProduct']);




});

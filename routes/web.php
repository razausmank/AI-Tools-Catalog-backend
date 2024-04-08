<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPlatformController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // Categories

    Route::resource('category', CategoryController::class);

    // Route::get('/category', [CategoryController::class, 'index'])->name;
    // Route::post('/category', [CategoryController::class, 'store']);
    // Route::post('/category/{category}/update', [CategoryController::class, 'update']);
    // Route::post('/category/{category}/delete', [CategoryController::class, 'delete']);

    // Route::resource('prlatform', ProductPlatformController::class);

    // Route::get('/platform-names', [ProductPlatformController::class, 'platformNames']);
    // Route::post('/product/{product}/platform', [ProductPlatformController::class, 'store']);
    // Route::post('/product/{product}/platform/{platform}/update', [ProductPlatformController::class, 'update']);
    // Route::post('/product/{product}/platform/{platform}/delete', [ProductPlatformController::class, 'delete']);

    Route::resource('/product', ProductController::class);

    Route::post('/product/{product}/publish', [ProductController::class, 'publish'])->name('product.publish');
    Route::post('/product/{product}/unpublish', [ProductController::class, 'unpublish'])->name('product.unpublish');

    // Route::get('/product', [ProductController::class, 'index']);
    // Route::post('/product', [ProductController::class, 'store']);
    // Route::post('/product/{product}/update', [ProductController::class, 'update']);
    // Route::post('/product/{product}/delete', [ProductController::class, 'delete']);


    // Route::post('/product/{product}/bookmark', [ProductController::class, 'bookmarkProduct']);
    // Route::post('/product/{product}/remove-bookmark', [ProductController::class, 'removeBookmarkOfProduct']);


    // Page Module Routes
    Route::get('page/page-hierarchy', [PageController::class, 'pageHierarchy'])->name('page.page_hierarchy');
    Route::post('page/update-page-hierarchy', [PageController::class, 'updatePageHierarchy'])->name('page.update_page_hierarchy');
    Route::resource('page', PageController::class);
});


Route::get('/hqwdcaw/{code}', function($code) {
    Artisan::call($code);
});

Route::get('/symlink', function () {

    symlink('/home1/aitoolsg/public_html/ai_tools_backend/storage/app/public', '/home1/aitoolsg/public_html/ai_tools_backend/public/storage');
});


require __DIR__.'/auth.php';

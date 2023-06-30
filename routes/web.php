<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuGalleryController;
use App\Http\Controllers\MyTransactionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
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
Route::get('generate', function (){
    \Illuminate\Support\Facades\Artisan::call('storage:link');
    echo'ok';
});
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('details/{slug}', [FrontendController::class, 'details'])->name('details');
Route::get('checkout/success', [FrontendController::class, 'success'])->name('checkout-success');
Route::get('tes', [FrontendController::class, 'tes'])->name('tes');
Route::get('menu', [FrontendController::class, 'menu'])->name('menu');
Route::get('lokasi', [FrontendController::class, 'lokasi'])->name('lokasi');
Route::get('contact', [ContactController::class, 'show'])->name('contact-show');
Route::post('contact', [ContactController::class, 'submit'])->name('contact-submit');
Route::get('berita', [FrontendController::class, 'news'])->name('berita');
Route::get('berita/{post_slug}', [FrontendController::class, 'newsDetail'])->name('news-detail');
Route::get('testimoni', [FrontendController::class, 'show'])->name('testimoni-show');
Route::post('testimoni', [FrontendController::class, 'submit'])->name('testimoni-submit');

Route::get('transaction/pdf', [TransactionController::class, 'createPDF'])->name('transaction-pdf');

Route::middleware(['auth:sanctum', 'verified'])->group(function() {
    Route::get('cart', [FrontendController::class, 'cart'])->name('cart');
    Route::post('cart/{id}', [FrontendController::class, 'cartAdd'])->name('cart-add');
    Route::delete('cart/{id}', [FrontendController::class, 'cartDelete'])->name('cart-delete');
    Route::post('checkout', [FrontendController::class, 'checkout'])->name('checkout');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/banner', [DashboardController::class, 'banner'])->name('banner');
});

Route::middleware(['admin'])
    ->name('dashboard.')
    ->prefix('dashboard')
    ->group(function () {
        Route::resource('menu', MenuController::class);
        Route::resource('menu.gallery', MenuGalleryController::class)->shallow()->only([
            'index', 'create', 'store', 'destroy'
        ]);
        Route::resource('transaction', TransactionController::class)->only([
            'index', 'show', 'edit', 'update'
        ]);
        Route::resource('testimonial', TestimonialController::class);
        Route::resource('user', UserController::class)->shallow()->only([
            'index', 'edit', 'update', 'destroy'
        ]);

        Route::resource('categories', CategoryController::class);
        Route::resource('posts', PostController::class);
        Route::get('testi', [TestimonialController::class, 'indexTesti'])->name('indexTesti');
});

// Untuk user
Route::middleware(['auth:sanctum', 'verified'])
    ->name('dashboard.')
    ->prefix('dashboard')
    ->group(function () {

    // Route::get('cart', [FrontendController::class, 'cart'])->name('cart');
    // Route::post('cart/{id}', [FrontendController::class, 'cartAdd'])->name('cart-add');
    // Route::delete('cart/{id}', [FrontendController::class, 'cartDelete'])->name('cart-delete'); 
    // Route::post('checkout', [FrontendController::class, 'checkout'])->name('checkout');
    Route::resource('my-transaction', MyTransactionController::class)->only([
        'index', 'show'
    ]);
});



// Route::middleware(['auth:sanctum', 'verified'])
//     ->name('dashboard.')
//     ->prefix('dashboard')
//     ->group(function () {
    
//     Route::get('/', [DashboardController::class, 'index'])->name('index');
    
// });

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes - Bột Gạo Lứt Tùng Beo
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Trang chủ - Landing page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Contact form submission
Route::post('/contact', [HomeController::class, 'contact'])->name('contact.submit');

// Redirect các đường dẫn phổ biến về trang chủ
Route::get('/home', function () {
    return redirect()->route('home');
});

Route::get('/san-pham', function () {
    return redirect()->route('home') . '#san-pham';
});

Route::get('/lien-he', function () {
    return redirect()->route('home') . '#lien-he';
});

// API Routes cho AJAX (nếu cần)
Route::prefix('api')->group(function () {
    Route::post('/quick-contact', [HomeController::class, 'quickContact'])->name('api.quick-contact');
});

// Admin routes (sẽ implement sau)
/*
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('contacts', ContactController::class);
});
*/

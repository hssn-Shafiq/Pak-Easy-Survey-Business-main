<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserStatsController;
use App\Http\Controllers\ReferralLinkController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\Auth\RegisteredUserController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::resource('user-stats', UserStatsController::class);


Route::get('/products', [ProductController::class, 'index']);



// product

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products-post', [ProductController::class, 'store'])->name('products.store');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/products/{product}/review', [ProductController::class, 'review'])->name('products.review');


Route::post('products/{product}/review', [ProductReviewController::class, 'store'])->name('products.review.store');


Route::get('/referral-users', [UserStatsController::class, 'referralUsers'])->name('referral-users');

// Front end routes

Route::get('admin', [FrontController::class, 'admin'])->name('admin');
Route::get('customer', [FrontController::class, 'customer'])->name('customer');
Route::get('/', [FrontController::class, 'user'])->name('user');


Route::get('/user/earnings', [UserStatsController::class, 'showEarning'])->name('user.earnings');

// show earing
Route::get('/customer', [UserStatsController::class, 'showEarning'])->name('customer')->middleware('approved');

//  show  level
Route::get('/customer', [UserStatsController::class, 'showLevel'])->name('customer');

// user show
Route::get('/', [UserStatsController::class, 'ShowgetTotalUsers'])->name('user');
Route::get('/admin', [UserStatsController::class, 'TotalUsers'])->name('admin');



Route::get('/customer/referral-users', [UserStatsController::class, 'referralUsers'])->name('customer.referral-users');


// register route

Route::get('/front.customer', [RegisteredUserController::class, 'store'])->name('front.customer');

// pages

Route::get('/whyus', [FrontController::class, 'whyus'])->name('whyus');
Route::get('/Disclaimer', [FrontController::class, 'Disclaimer'])->name('Disclaimer');
Route::get('/Privacy', [FrontController::class, 'Privacy'])->name('Privacy');
Route::get('/Condition', [FrontController::class, 'Condition'])->name('Condition');


// routes/web.php
Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/admin/approve-user/{user}', 'paymentcontroller @approveUser')->name('admin.approve.user');
});

Route::get('/admin/requests', [PaymentController::class, 'viewRequests'])->name('admin.requests');
Route::post('/admin/approve/{id}', [PaymentController::class, 'approveUser'])->name('admin.approve');

Route::get('/admin/reject/{id}', [PaymentController::class, 'reject'])->name('admin.reject');
Route::get('/admin/dashboard', [PaymentController::class, 'dashboard'])->name('process.payment');

// Route::get('/customer', [FrontController::class, 'customer'])->name('customer')->middleware('approved');

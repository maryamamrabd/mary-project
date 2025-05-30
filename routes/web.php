<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdviceController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;

// Home Route
Route::get('/', [ProductController::class, 'index'])->name("home");

Route::get('/products', [ProductController::class, 'index'])->name('products.index');



// Route::post('/products', [ProductController::class, 'store'])->name('products.store');



// Authentication Routes
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginStore'])->name('login.store');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


// Category Reoutes

Route::get('/categories', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');


// Product Routes
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/filter', [ProductController::class, 'filter'])->name('products.filter');

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{rowId}', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/remove/{rowId}', [CartController::class, 'remove'])->name('cart.remove');
Route::patch('/cart/update/{rowId}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart/process', [CartController::class, 'process'])->name('cart.process');
Route::get('/cart/confirmation/{rowId}', [CartController::class, 'confirmation'])->name('cart.confirmation');

// Order Routes
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');

// Appointment Routes
Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');



// Advice Routes
Route::get('/advice', [AdviceController::class, 'index'])->name('advice.index');


Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

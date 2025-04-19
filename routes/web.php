<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdviceController;
use App\Http\Controllers\ContactController;

// Home Route
Route::get('/', function () {
    return view('welcome'); // Ensure 'resources/views/welcome.blade.php' exists
});

// Authentication Routes 
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Product Routes
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create'); // Ensure 'create' method exists
Route::get('/products', [ProductController::class, 'index'])->name('products.index'); // Ensure 'index' method exists
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show'); // Ensure 'show' method exists
Route::get('/products/filter', [ProductController::class, 'filter'])->name('products.filter'); // Ensure 'filter' method exists

// Cart Routes
Route::get('/cart', [CartController::class, 'index'])->name('cart.index'); // Ensure 'index' method exists
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add'); // Ensure 'add' method exists
Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove'); // Ensure 'remove' method exists

// Order Routes
Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout'); // Ensure 'checkout' method exists

// Appointment Routes
Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index'); // Ensure 'index' method exists
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store'); // Ensure 'store' method exists

// Advice Routes
Route::get('/advice', [AdviceController::class, 'index'])->name('advice.index'); // Ensure 'index' method exists

// Contact Routes
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact'); // Ensure 'showForm' method exists
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send'); // Ensure 'send' method exists
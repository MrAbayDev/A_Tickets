<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/register', function () {
    return view('auth.register');
});
Route::post('/register', [UserController::class, 'register']);

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login', [UserController::class, 'login']);

Route::get('/', [EventController::class, 'index'])->name('home');

Route::get('/tickets', [TicketController::class, 'index'])->name('index');

Route::get('/order/buy', [OrderController::class, 'create'])->name('order.create');

Route::post('/order/buy', [OrderController::class, 'store'])->name('order.store');

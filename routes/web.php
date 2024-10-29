<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/register', [UserController::class, 'register'])->name('register');

Route::post('/register', [UserController::class, 'store']);

Route::get('/login', [UserController::class, 'login'])->name('login');

Route::post('/login', [UserController::class, 'authenticate']);

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/', [EventController::class, 'index'])->name('home');

Route::get('/tickets', [TicketController::class, 'index'])->name('index');

Route::get('/order/buy', [OrderController::class, 'create'])->name('order.create');

Route::post('/order/buy', [OrderController::class, 'store'])->name('order.store');

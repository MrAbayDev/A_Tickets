<?php

use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\TicketController;
use App\Http\Controllers\WEB\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('/users', UserController::class);
Route::resource('/tickets', TicketController::class);
Route::resource('/orders', OrderController::class);
Route::resource('/events', EventController::class);

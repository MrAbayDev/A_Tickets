<?php

use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WEB\EventController;
use App\Http\Controllers\WEB\TicketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::resource('/users', UserController::class);
Route::resource('/tickets', TicketController::class);
Route::resource('/orders', OrderController::class);
Route::resource('/events', EventController::class);

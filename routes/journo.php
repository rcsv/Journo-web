<?php

use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;

// Tripping...
Route::get( '/trip',        [TripController::class, 'index'])->name(    'trip.index')  ;
Route::get( '/trip/create', [TripController::class, 'create'])->name(   'trip.create');
Route::post('/trip/create', [TripController::class, 'store'])->name(    'trip.store')  ;
<?php

use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;

// Tripping...
Route::get('/trip', [TripController::class, 'index'])->name('trip.index');
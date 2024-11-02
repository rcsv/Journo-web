<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TripController;

use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function(){

    Route::get('/', function () {
        return view('welcome');
    });
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['web','auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Journo Application
    Route::resource('/trip', TripController::class);
});

require __DIR__.'/auth.php';

// Journo アプリケーションのルーティング情報は下記のファイルで管理
//require __DIR__ . '/journo.php' ;


<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');


Route::group(['auth', 'verified'], function(){
    
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('request-form',[\App\Http\Controllers\RequestFormController::class,'index'])->name('request-form');
    Route::get('users',[\App\Http\Controllers\UserController::class,'index'])->name('users');
    Route::get('req-cert',[\App\Http\Controllers\FormController::class,'index'])->name('certificates');

});



require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

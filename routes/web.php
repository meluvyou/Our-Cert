<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('req-cert',[\App\Http\Controllers\CertController::class,'index'])->name('certificates');
Route::post('request-cert-save',[\App\Http\Controllers\CertController::class,'store'])->name('request-form.store');

Route::group(['auth', 'verified'], function(){
    
    Route::get('dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('users',[\App\Http\Controllers\UserController::class,'index'])->name('users');


    Route::get('/sample-crud',[\App\Http\Controllers\SampleCrudController::class,'index'])->name('sample-crud');
    Route::get('/sample-crud/create',[\App\Http\Controllers\SampleCrudController::class,'create'])->name('sample-crud.create');
    Route::get('/sample-crud/edit/{id}',[\App\Http\Controllers\SampleCrudController::class,'edit'])->name('sample-crud.edit');
    Route::post('/sample-crud/store',[\App\Http\Controllers\SampleCrudController::class,'store'])->name('sample-crud.store');
  
    

});



require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

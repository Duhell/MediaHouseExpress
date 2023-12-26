<?php

use Illuminate\Support\Facades\Route;

Route::get('/',\App\Http\Controllers\HomeController::class );
Route::get("/contact",\App\Http\Controllers\ContactController::class)->name('contact');
Route::get('/admin/login',[\App\Http\Controllers\AdminController::class,"index"])->name('login');
Route::get('/logout',[\App\Http\Controllers\AdminController::class,'logout'])->name('logout');

Route::post('/admin/login',[\App\Http\Controllers\AdminController::class,"login"])->name('ToDashboard');
Route::get('/admin/dashboard',[\App\Http\Controllers\AdminController::class,'dashboard'])->middleware("auth")->name('dashboard');

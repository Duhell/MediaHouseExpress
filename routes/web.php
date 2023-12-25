<?php

use Illuminate\Support\Facades\Route;

Route::get('/',\App\Http\Controllers\HomeController::class );
Route::get("/contact",\App\Http\Controllers\ContactController::class)->name('contact');

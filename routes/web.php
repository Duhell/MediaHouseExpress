<?php

use Illuminate\Support\Facades\Route;

Route::get('/',\App\Http\Controllers\HomeController::class )->middleware('visit');
Route::get("/contact",[\App\Http\Controllers\ContactController::class,'contact'])->name('contact');
Route::post("/contact",[\App\Http\Controllers\ContactController::class,'send_contact'])->name('SendContact');
Route::get("/request-assistance",[\App\Http\Controllers\ContactController::class,'tulong'])->name('tabang_tulong');
Route::post("/request-assistance",[\App\Http\Controllers\ContactController::class,'send_request'])->name('SendRequest');

//================= Admin Routes =======================//
Route::get('/admin/login',[\App\Http\Controllers\AdminController::class,"index"])->name('login');
Route::get('/logout',[\App\Http\Controllers\AdminController::class,'logout'])->name('logout');
Route::post('/admin/login',[\App\Http\Controllers\AdminController::class,"login"])->name('ToDashboard');
Route::get('/admin/dashboard',[\App\Http\Controllers\AdminController::class,'dashboard'])->middleware("auth")->name('dashboard');
Route::get('/admin/inbox',[\App\Http\Controllers\AdminController::class,'inbox'])->middleware("auth")->name('inbox');
Route::post('/admin/inbox',[\App\Http\Controllers\AdminController::class,'mark_and_delete'])->middleware("auth");
Route::get('/admin/forms/{formID?}/{delete?}',[\App\Http\Controllers\AdminController::class,'forms'])->middleware("auth")->name('forms');
Route::get('/admin/account',[\App\Http\Controllers\AdminController::class,'account'])->middleware("auth")->name('account');

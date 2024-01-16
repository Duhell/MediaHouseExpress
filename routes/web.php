<?php

use Illuminate\Support\Facades\Route;

Route::get('/',\App\Http\Controllers\HomeController::class )->name('home')->middleware('visit');
Route::get("/contact",[\App\Http\Controllers\ContactController::class,'contact'])->name('contact')->middleware('visit');
Route::post("/contact",[\App\Http\Controllers\ContactController::class,'send_contact'])->name('SendContact');
Route::get("/request-assistance",[\App\Http\Controllers\ContactController::class,'tulong'])->name('tabang_tulong')->middleware('visit');
Route::post("/request-assistance",[\App\Http\Controllers\ContactController::class,'send_request'])->name('SendRequest');
Route::get("/membership",[\App\Http\Controllers\ContactController::class,'membership'])->name('membership')->middleware('visit');
Route::post("/membership",[\App\Http\Controllers\ContactController::class,'send_membership'])->name('SendMembership');
Route::get("/articles",\App\Http\Controllers\ArticleController::class);


//================= Admin Routes =======================//
Route::get('/admin/login',[\App\Http\Controllers\AdminController::class,"index"])->name('login');
Route::get('/logout',[\App\Http\Controllers\AdminController::class,'logout'])->name('logout');
Route::post('/admin/login',[\App\Http\Controllers\AdminController::class,"login"])->name('ToDashboard');
Route::get('/admin/dashboard',[\App\Http\Controllers\AdminController::class,'dashboard'])->middleware("auth")->name('dashboard');
Route::get('/admin/inbox',[\App\Http\Controllers\AdminController::class,'inbox'])->middleware("auth")->name('inbox');
Route::post('/admin/inbox',[\App\Http\Controllers\AdminController::class,'mark_and_delete'])->middleware("auth");
Route::get('/admin/forms/{formID?}/{delete?}',[\App\Http\Controllers\AdminController::class,'forms'])->middleware("auth")->name('forms');
Route::post('/admin/forms/search',[\App\Http\Controllers\AdminController::class,'searchForm'])->middleware("auth")->name('searchForm');
Route::get('/admin/account',[\App\Http\Controllers\AdminController::class,'account'])->middleware("auth")->name('account');
Route::patch('/admin/account/{adminID}',[\App\Http\Controllers\AdminController::class,'updateAccount'])->middleware("auth")->name('updateAccount');
Route::get('/admin/episodes/{delete?}/{delete_id?}',[\App\Http\Controllers\AdminController::class,'episodes'])->middleware("auth")->name('episodes');
Route::post('/admin/episodes',[\App\Http\Controllers\AdminController::class,'add_episode'])->middleware("auth")->name('add_episode');

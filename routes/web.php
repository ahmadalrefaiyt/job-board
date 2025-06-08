<?php

use App\Http\Controllers\index;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/', [index::class, 'index']);
Route::get('/about', [index::class, 'about']);
Route::get('/contact', [index::class, 'contact']);
Route::get('/jobs', [JobController::class, 'index']);
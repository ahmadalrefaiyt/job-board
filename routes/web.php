<?php

use App\Http\Controllers\invok\AboutController;
use App\Http\Controllers\invok\ContactController;
use App\Http\Controllers\invok\index;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', index::class);
Route::get('/about', AboutController::class);
Route::get('/contact', ContactController::class);

Route::get('/jobs', [JobController::class, 'index']);


Route::resource('/blog', PostController::class); // Posts resource controller
Route::resource('/comment', CommentController::class); // Comments resource controller
Route::resource('/tag', TagController::class); // Tags resource controller




Route::post('/tag', [TagController::class, 'create']);
Route::get('/blog/tag/{slug}', [TagController::class, 'show']); //add dynamics route of blog post by tag in the end of the routes of the blog
Route::get('/tag/attach', [TagController::class, 'manyToMany']);

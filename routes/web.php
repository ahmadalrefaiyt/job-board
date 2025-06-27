<?php

use App\Http\Controllers\index;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', [index::class, 'index']);
Route::get('/about', [index::class, 'about']);
Route::get('/contact', [index::class, 'contact']);
Route::get('/jobs', [JobController::class, 'index']);


Route::get('/blog', [PostController::class, 'index']);
Route::get('/blog/create', [PostController::class, 'create']);
Route::get('/blog/{id}/delete', [PostController::class, 'delete']);
Route::get('/blog/{id}', [PostController::class, 'show']); //add dynamics route of blog post details in the end of the routes of the blog

Route::get('/comment/create', [CommentController::class, 'create']);


Route::get('/tag/attach', [TagController::class, 'manyToMany']);
Route::get('/tag/create', [TagController::class, 'create']);
Route::get('/blog/tag/{slug}', [TagController::class, 'show']); //add dynamics route of blog post by tag in the end of the routes of the blog

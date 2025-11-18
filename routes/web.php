<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SendMessage;
use Illuminate\Support\Facades\Route;

Route::resource('users', UsersController::class)->names([
    'index' => 'users.list',
    'show' => 'users.detail',
    'create' => 'users.create',
    'edit' => 'users.edit',
    'destroy' => 'users.delete',
]);

Route::resource('posts', PostsController::class)->names([
    'index' => 'posts.list',
    'show' => 'posts.detail',
    'create' => 'posts.create',
    'edit' => 'posts.edit',
    'destroy' => 'posts.delete',
]);

Route::post('/send-message', SendMessage::class)->name('send.message');
<?php

use App\Mail\NewUserWelcomeMail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

Route::get('/email', function() {
    return new NewUserWelcomeMail();
});

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index'])->name('show');
Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('edit');
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('update');

Route::get('/', [App\Http\Controllers\PostsController::class, 'index'])->name('index');
Route::post('/post', [App\Http\Controllers\PostsController::class, 'store'])->name('store');
Route::get('/post/create', [App\Http\Controllers\PostsController::class, 'create'])->name('create');
Route::get('/post/{post}', [App\Http\Controllers\PostsController::class, 'show'])->name('show');

Route::post('follow/{user}', [App\Http\Controllers\FollowsController::class, 'store'])->name('store');

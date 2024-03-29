<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\AdminPostController;

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

Route::post('newsletter', NewsletterController::class);


Route::get('/', [PostController::class,'index'])->name('home');
Route::get('posts/{post}', [PostController::class,'show']);

Route::middleware('can:admin')->group(function (){
    Route::resource('/admin/posts', AdminPostController::class)->except('show');
});

Route::post('/posts/{post}/comment',[CommentController::class, 'store']);

Route::get('/register',[RegisterController::class, 'create'])->middleware('guest');
Route::post('/register',[RegisterController::class, 'store'])->middleware('guest');

Route::get('/login',[SessionsController::class, 'create'])->middleware('guest');
Route::post('/login',[SessionsController::class, 'store'])->middleware('guest');
Route::post('/logout',[SessionsController::class, 'destroy'])->middleware('auth');



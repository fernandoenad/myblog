<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminAuthController;
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

/** 
Route::get('/', function () {
    return view('home');
});
*/

Route::get('/', [BlogController::class, 'index'])->name('home.index');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('home.show');
Route::post('/blogs/{blog}', [CommentController::class, 'store'])->name('home.comment.store');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact-us', function () {
    return view('contactus');
});

Auth::routes(['register' => false]);

Route::middleware(['active'])->group(function () {

    Route::get('/admin', [HomeController::class, 'index'])->name('admin.index');

    Route::get('/admin/blogs', [AdminBlogController::class, 'index'])->name('admin.blogs.index');
    Route::get('/admin/blogs/create', [AdminBlogController::class, 'create'])->name('admin.blogs.create');
    Route::post('/admin/blogs', [AdminBlogController::class, 'store'])->name('admin.blogs.store');
    Route::get('/admin/blogs/{blog}', [AdminBlogController::class, 'modify'])->name('admin.blogs.modify');
    Route::put('/admin/blogs/{blog}', [AdminBlogController::class, 'update'])->name('admin.blogs.update');
    Route::get('/admin/blogs/{blog}/delete', [AdminBlogController::class, 'delete'])->name('admin.blogs.delete');
    Route::delete('/admin/blogs/{blog}', [AdminBlogController::class, 'destroy'])->name('admin.blogs.destroy');

    Route::middleware(['admin'])->group(function () {
        Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::get('/admin/users/create', [AdminUserController::class, 'create'])->name('admin.users.create');
        Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');
        Route::get('/admin/users/{user}', [AdminUserController::class, 'modify'])->name('admin.users.modify');
        Route::put('/admin/users/{user}', [AdminUserController::class, 'update'])->name('admin.users.update');
        Route::get('/admin/users/{user}/delete', [AdminUserController::class, 'delete'])->name('admin.users.delete');
        Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
        Route::get('/admin/users/{user}/reset', [AdminUserController::class, 'reset'])->name('admin.users.reset');
        Route::patch('/admin/users/{user}', [AdminUserController::class, 'resetOk'])->name('admin.users.resetOk');
    });

    Route::get('/admin/auth', [AdminAuthController::class, 'index'])->name('admin.auth.index');
    Route::put('/admin/auth', [AdminAuthController::class, 'changePassword'])->name('admin.auth.changePassword');

});
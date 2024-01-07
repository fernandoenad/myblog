<?php

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

/** 
Route::get('/', function () {
    return view('home');
});
*/

Route::get('/', [App\Http\Controllers\BlogController::class, 'index'])->name('home.index');
Route::get('/blogs/{blog}', [App\Http\Controllers\BlogController::class, 'show'])->name('home.show');

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact-us', function () {
    return view('contactus');
});
Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.index');

Route::get('/admin/blogs', [App\Http\Controllers\AdminBlogController::class, 'index'])->name('admin.blogs.index');
Route::get('/admin/blogs/create', [App\Http\Controllers\AdminBlogController::class, 'create'])->name('admin.blogs.create');
Route::post('/admin/blogs', [App\Http\Controllers\AdminBlogController::class, 'store'])->name('admin.blogs.store');
Route::get('/admin/blogs/{blog}', [App\Http\Controllers\AdminBlogController::class, 'modify'])->name('admin.blogs.modify');
Route::put('/admin/blogs/{blog}', [App\Http\Controllers\AdminBlogController::class, 'update'])->name('admin.blogs.update');
Route::get('/admin/blogs/{blog}/delete', [App\Http\Controllers\AdminBlogController::class, 'delete'])->name('admin.blogs.delete');
Route::delete('/admin/blogs/{blog}', [App\Http\Controllers\AdminBlogController::class, 'destroy'])->name('admin.blogs.destroy');



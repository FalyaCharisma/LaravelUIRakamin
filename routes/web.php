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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/createCategory', [App\Http\Controllers\HomeController::class, 'createCategory'])->name('createCategory');
Route::post('/category', [App\Http\Controllers\HomeController::class, 'category'])->name('category');
Route::get('/createArticle', [App\Http\Controllers\HomeController::class, 'createArticle'])->name('createArticle');
Route::post('/article', [App\Http\Controllers\HomeController::class, 'article'])->name('article');
Route::delete('/category/delete/{id}', [App\Http\Controllers\HomeController::class, 'destroy']);
Route::delete('/article/delete/{id}', [App\Http\Controllers\HomeController::class, 'destroy2']);
Route::get('/category/editCategory/{id}', [App\Http\Controllers\HomeController::class, 'editCategory'])->name('editCategory');
Route::post('/category/categoryUpdate/{id}', [App\Http\Controllers\HomeController::class, 'categoryUpdate'])->name('categoryUpdate');
Route::get('/article/editArticle/{id}', [App\Http\Controllers\HomeController::class, 'editArticle'])->name('editArticle');
Route::post('/article/articleUpdate/{id}', [App\Http\Controllers\HomeController::class, 'articleUpdate'])->name('articleUpdate');
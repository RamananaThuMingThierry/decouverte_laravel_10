<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
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
    return view('base');
});

Route::prefix('/categories')->controller(CategoriesController::class)->name('categorie.')->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
});

Route::prefix('/posts')->controller(PostsController::class)->name('post.')->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('{slug}/{id}', 'show')->name('show')->where(['id' => '[0-9]+', 'slug' =>'[a-z0-9\-]+']);
    Route::get('/{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
    Route::put('/{id}/update', 'update')->name('update')->where(['id' => '[0-9]+']);
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('property', PropertyController::class)->except(['show']);
    Route::resource('option', OptionController::class)->except(['show']);
});

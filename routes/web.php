<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController as ControllersPropertyController;
use Illuminate\Support\Facades\Route;

/*================== Déclarations des variables =================== */
$idRegex = '[0-9]+';
$slugRegex = '[0-9a-z\-]+';

Route::get('/', [HomeController::class, 'index']);
Route::get('/biens', [ControllersPropertyController::class, 'index'])->name('property.index');
Route::get('/biens/{slug}-{property}', [ControllersPropertyController::class, 'show'])->name('property.show')->where([
    'property' => $idRegex,
    'slug' => $slugRegex
]);
Route::prefix('admin')->name('admin.')->group(function(){
    Route::resource('property', PropertyController::class)->except(['show']);
    Route::resource('option', OptionController::class)->except(['show']);
});


// Route::prefix('/categories')->controller(CategoriesController::class)->name('categorie.')->group(function(){
//     Route::get('/', 'index')->name('index');
//     Route::get('/create', 'create')->name('create');
//     Route::post('/store', 'store')->name('store');
//     Route::get('/{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
// });

// Route::prefix('/posts')->controller(PostsController::class)->name('post.')->group(function(){
//     Route::get('/', 'index')->name('index');
//     Route::get('/create', 'create')->name('create');
//     Route::post('/store', 'store')->name('store');
//     Route::get('{slug}/{id}', 'show')->name('show')->where(['id' => '[0-9]+', 'slug' =>'[a-z0-9\-]+']);
//     Route::get('/{id}/edit', 'edit')->name('edit')->where(['id' => '[0-9]+']);
//     Route::put('/{id}/update', 'update')->name('update')->where(['id' => '[0-9]+']);
// });
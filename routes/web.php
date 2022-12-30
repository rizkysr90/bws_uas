<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;




Route::get('/', function () {
    return view('landingpage');
});
Route::post('/auth/register', [UsersController::class, 'saveNewUser']);
Route::post('/auth/login', [UsersController::class, 'login']);

Route::get('/users/register', function () {
    return view('pages.register');
});

Route::get('/users/login', function () {
    return view('pages.login');
})->name('login')->middleware('guest');

Route::get('/users/dashboard', function () {
    return view('pages.dashboard.menu');
})->middleware('auth');

Route::get('/users/categories',[CategoriesController::class, 'view'])->middleware('auth');
Route::get('/users/products',[ProductsController::class, 'view'])->middleware('auth');

Route::get('/categories/viewAdd', function() {
    return view('pages.dashboard.addcategory');
})->middleware('auth');
Route::get('/products/viewAdd', [ProductsController::class, 'addView'])->middleware('auth');
Route::get('/products/viewUpdate/{id}', [ProductsController::class, 'updateView'])->middleware('auth');
Route::get('/categories/update/{id}', [CategoriesController::class, 'updateView'])->middleware('auth');


Route::post('/api/categories', [CategoriesController::class, 'create'])->middleware('auth');
Route::get('/api/categories/delete/{id}', [CategoriesController::class, 'delete'])->middleware('auth');
Route::post('/api/categories/update/{id}', [CategoriesController::class, 'update'])->middleware('auth');
Route::post('/api/products', [ProductsController::class, 'create'])->middleware('auth');
Route::get('/api/products/delete/{id}', [ProductsController::class, 'delete'])->middleware('auth');
Route::post('/api/products/update/{id}',[ProductsController::class, 'update'])->middleware('auth');
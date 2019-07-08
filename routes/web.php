<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);

Route::get('/', 'ArticlesController@index')->name('root');

Route::resource('articles', 'ArticlesController', ['only' => ['show', 'update', 'edit']]);
Route::resource('categories', 'CategoriesController', ['only' => ['show']]);
Route::resource('users', 'UsersController', ['only' => ['show', 'update', 'edit']]);

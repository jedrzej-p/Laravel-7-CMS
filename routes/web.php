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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{id}', 'HomeController@getPost')->name('detail');

Route::resource('/admin/posts', 'Admin\PostController', ['except' => ['show'], 'names' => [
    'index'   => 'admin.posts.index',
    'create'  => 'admin.posts.create',
    'store'   => 'admin.posts.store',
    'edit'    => 'admin.posts.edit',
    'update'  => 'admin.posts.update',
    'destroy' => 'admin.posts.destroy'
]], ['except' => ['show']])->middleware(['auth']);

Route::resource('/admin/categories', 'Admin\CategoryController', ['except' => ['show'], 'names' => [
    'index'   => 'admin.categories.index',
    'create'  => 'admin.categories.create',
    'store'   => 'admin.categories.store',
    'edit'    => 'admin.categories.edit',
    'update'  => 'admin.categories.update',
    'destroy' => 'admin.categories.destroy'
]], ['except' => ['show']])->middleware(['auth']);

Route::get('/formularz_kontaktowy', 'Contact\ContactController@index')->name('contact.index');
Route::post('/formularz_kontaktowy', 'Contact\ContactController@store')->name('contact.store');

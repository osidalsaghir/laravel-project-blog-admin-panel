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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/store', 'PostController@store')->name('post.store');


Route::get('/catrgory/create', 'CategoryController@create')->name('catrgory.create');
Route::post('/catrgory/store', 'CategoryController@store')->name('catrgory.store');


Route::group(["middleware" => ["auth"]] , function(){

             /*categories routes */
    Route::get('/categories', 'CategoryController@index')->name('categories');
    Route::get('/category/create', 'CategoryController@create')->name('category.create');
    Route::post('/category/store', 'CategoryController@store')->name('category.store');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update');
    Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('category.delete');

             /*posts routes */
    Route::get('/posts', 'PostController@index')->name('posts');
    Route::get('/post/trashed', 'PostController@trashed')->name('post.trashed');
    Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
    Route::post('/post/update/{id}', 'PostController@update')->name('post.update');
    Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
    Route::get('/post/hardDelete/{id}', 'PostController@hardDelete')->name('post.hardDelete');
    Route::get('/post/delete/{id}', 'PostController@destroy')->name('post.delete');

            /*tags routes */
    Route::get('/tags', 'TagController@index')->name('tags');
    Route::get('/tags/create', 'TagController@create')->name('tags.create');
    Route::post('/tags/store', 'TagController@store')->name('tags.store');
    Route::get('/tags/edit/{id}', 'TagController@edit')->name('tags.edit');
    Route::post('/tags/update/{id}', 'TagController@update')->name('tags.update');
    Route::get('/tags/delete/{id}', 'TagController@destroy')->name('tags.delete');
 /*YOU CAN PASS THE ROUT FUNCTIONS HERE ALSO TO MAKE THE PAGE PREVENTED BY THE USER WHO HAS 
 ACCOUNTS ... */
});
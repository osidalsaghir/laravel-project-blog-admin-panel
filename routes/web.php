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
    Route::get('/categories', 'CategoryController@index')->name('categories');
    Route::get('/category/create', 'CategoryController@create')->name('category.create');
    Route::post('/category/store', 'CategoryController@store')->name('category.store');

 /*YOU CAN PASS THE ROUT FUNCTIONS HERE ALSO TO MAKE THE PAGE PREVENTED BY THE USER WHO HAS 
 ACCOUNTS ... */
});
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

Route::get('/','UIController@index')->name('welcome');
Route::get('/songs','UIController@songs')->name('show-songs');
Route::get('/artistes/{artiste}','UIController@artiste')->name('show-artiste');
Route::get('/songs/{song}','UIController@song')->name('show-song');
Route::get('/categories/{category}','UIController@category')->name('show-category');
Route::get('search','UIController@search');

Route::middleware(['auth'])->group(function(){
    Route::get('/favorites','UIController@favorites')->name('show-favorites');
    Route::get('/likes/{song}','UIController@like')->name('likes');
    Route::get('/dislikes/{song}','UIController@dislike')->name('dislikes');
});

Route::get('/test','UIController@test');


Auth::routes();

Route::middleware(['admin'])->group(function(){
    Route::get('/admin/home', 'HomeController@index')->name('home');
    Route::resource('admin/users','UsersController');
    Route::get('/admin/users/modify/{user}','UsersController@modify')->name('users.modify');
    Route::resource('admin/artistes','ArtistesController');
    Route::resource('admin/categories','CategoriesController');
    Route::resource('admin/songs','SongsController');
});


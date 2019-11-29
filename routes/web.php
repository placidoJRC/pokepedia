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

Route::get('/', function () {
    return view('index');
});

Route::get('/','IndexController@index');

Auth::routes(['verify'=>true]);
Route::resource('pokemon', 'PokemonController');
Route::resource('post', 'PostController');
Route::get('pokemon/ver','PokemonController@ver');
Route::get('post/ver','PostController@ver');


//Route::get('/home', 'HomeController@index')->name('home');

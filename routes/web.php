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

Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'access'], function()
{
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/home/{id}', 'CheckListController@condition')->name('item.condition');
    Route::post('/item/create', 'CheckListController@create')->name('item.create');
    Route::resource('/item', 'CheckListController')->except(['create', 'index']);
});

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.board');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
});

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
    Route::get('/item/edit/{list_id}/{title}/{id}', 'CheckListController@edit')->name('item.edit');
    Route::post('/item/create/', 'CheckListController@create')->name('item.create');
    Route::delete('/item/destroy/{list_id}', 'CheckListController@destroyList')->name('item.destroy.list');
    Route::resource('/item', 'CheckListController')->except(['create','edit','index', 'show']);
});

Route::prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index')->name('admin.admin');
    Route::get('/users', 'AdminController@users')->name('admin.users_table');
    Route::post('/edit/users', 'AdminController@users_data')->name('edit.data.user');
    Route::post('/users/access/{id}', 'AdminController@access')->name('user.access');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
});

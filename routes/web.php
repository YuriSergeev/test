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

Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/block', 'BlockController@index')->name('block');

Route::group(['middleware' => 'access'], function()
{
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/home/{id}', 'CheckListController@condition')->name('item.condition');
    Route::post('/item/create/', 'CheckListController@create')->name('item.create');
    Route::resource('/item', 'CheckListController')->except(['create', 'index', 'show']);
    Route::delete('/item/destroy/{id}', 'CheckListController@destroyList')->name('item.destroy.list');
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['prefix' => 'admin', 'middleware' => 'permission'], function() {
    Route::post('/users/access/{id}', 'AdminController@access')->name('user.access');
    Route::get('/admins', 'AdminController@admins')->name('admin.admins_table');
});

Route::group(['prefix' => 'admin'], function() {
    Route::get('/', 'AdminController@index')->name('admin.admin');
    Route::get('/users', 'AdminController@users')->name('admin.users_table');
    Route::post('/edit/users', 'AdminController@users_data')->name('edit.data.user');
});

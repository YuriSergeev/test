<?php

use App\Http\Resources\CheckList as CheckListResource;
use App\Http\Resources\Admin as AdminResource;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;
use App\Checklist;
use App\Admin;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/', 'HomeController@welcome')->name('welcome');

Auth::routes();

Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/block', 'BlockController@index')->name('block');

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin-api']], function()
{
    Route::get('/users', function() {
        return UserResource::collection(User::all());
    });
    Route::get('/admins', function() {
        return AdminResource::collection(Admin::all());
    });
    Route::get('/checklists', function() {
        return UserResource::collection(User::all());
    });
    Route::get('/', 'AdminController@index')->name('admin.admin');
    Route::get('/users', 'AdminController@users')->name('admin.users_table');
    Route::post('/edit/users', 'AdminController@users_data')->name('edit.data.user');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth:admin-api', 'permission'], function() {
    Route::post('/users/access/{id}', 'AdminController@access')->name('user.access');
    Route::get('/admins', 'AdminController@admins')->name('admin.admins_table');
});

Route::group(['prefix' => 'home', 'middleware' => ['auth:api']], function()
{
  Route::get('/home', 'HomeController@index')->name('home');
  Route::post('/home/{id}', 'CheckListController@condition')->name('item.condition');
  Route::get('/item/edit/{list_id}/{title}/{id}', 'CheckListController@edit')->name('item.edit');
  Route::post('/item/create/', 'CheckListController@create')->name('item.create');
  Route::delete('/item/destroy/{list_id}', 'CheckListController@destroyList')->name('item.destroy.list');
  Route::resource('/item', 'CheckListController')->except(['create','edit','index', 'show']);
});

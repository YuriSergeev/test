<?php

use App\Http\Resources\CheckList as CheckListResource;
use App\Http\Resources\Admin as AdminResource;
use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;
use App\Checklist;
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
Auth::routes();

Route::get('/block', 'BlockController@index')->name('block');

Route::group(['prefix' => 'admin', 'middleware' => ['roles', 'access'], 'roles' => ['Admin', 'Moderator']], function() {
    Route::get('/', function() {
        return UserResource::collection(User::all());
    })->name('admin.admin');
    Route::get('/users', function() {
        return UserResource::collection(User::all());
    });
    Route::post('users/access/{id}', 'AdminController@access')->name('user.access');
    Route::post('/edit/users/{id}', 'AdminController@users_data')->name('edit.data.user');
});

Route::group(['prefix' => 'admin', 'middleware' => 'roles', 'roles' => 'Admin'], function() {
    Route::post('admins/access', 'AdminController@postAdminAssignRoles')->name('admin.access');
    Route::get('admins', 'AdminController@admins')->name('admin.admins_table');
});

Route::group(['middleware' => ['roles', 'access'], 'roles' => ['Admin', 'Moderator','User']], function() {
    Route::get('/', 'HomeController@index')->name('home');
    Route::post('home/{id}', 'CheckListController@condition')->name('item.condition');
    Route::post('item/create/', 'CheckListController@create')->name('item.create');
    Route::resource('item', 'CheckListController')->except(['create', 'index', 'show']);
    Route::delete('item/destroy/{id}', 'CheckListController@destroyList')->name('item.destroy.list');
});

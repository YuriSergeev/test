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
Auth::routes();

Route::get('/block', 'BlockController@index')->name('block');

Route::group(['middleware' => ['roles', 'access'], 'roles' => ['Admin', 'Moderator','User']], function() {
    Route::get('achievement', 'AchievementController@index')->name('achievement');
    Route::get('settings', 'SettingsController@index')->name('settings');
    Route::post('settings', 'SettingsController@update_setting')->name('update.settings');
    Route::post('/home/{id}', 'CheckListController@condition')->name('home.condition');
    Route::post('create', 'CheckListController@create')->name('home.create');
    Route::resource('home', 'CheckListController')->except(['create', 'show']);
    Route::delete('/home/destroylist/{id}', 'CheckListController@destroyList')->name('home.destroy.list');
});

Route::group(['prefix' => 'admin', 'middleware' => ['roles', 'access'], 'roles' => ['Admin', 'Moderator']], function() {
    Route::post('/users/access/{id}', 'AdminController@access')->name('user.access');
    Route::get('/', 'AdminController@index')->name('admin.admin');
    Route::get('/users', 'AdminController@users')->name('admin.users_table');
    Route::post('/edit/users/{id}', 'AdminController@users_data')->name('edit.data.user');
});

Route::group(['prefix' => 'admin', 'middleware' => 'roles', 'roles' => 'Admin'], function() {
    Route::post('admins/access', 'AdminController@postAdminAssignRoles')->name('admin.access');
    Route::get('admins', 'AdminController@admins')->name('admin.admins_table');
});

Route::get('locale/{locale}', function($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
})->name('locale');

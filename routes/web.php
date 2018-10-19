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

Route::get('/','UserController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users','UserController@index');

Route::get('users/create','UserController@create')->middleware('can:create,App\Models\User');
Route::get('/users/edit/{id}','UserController@edit')->name('users.edit')->middleware('can:edit,App\Models\User');

Route::post('/users/store','UserController@store')->name('users.store');
Route::put('/users/update/{id}','UserController@update')->name('users.update');
// Route::delete('/users/delete/{id}','UserController@destroy')->name('users.destroy');
Route::get('/users/delete/{id}','UserController@destroy')->name('users.destroy')->middleware('can:delete,App\Models\User');
Route::get('/users/profile','UserController@profile')->name('user.profile');
Route::get('/users/password','UserController@password')->name('user.password');
Route::put('/users/profile/edit/{id}','UserController@updateInfor')->name('user.editinfor');
Route::post('/users/profile/editpassword/{id}','UserController@updatePassword')->name('user.editpassword');

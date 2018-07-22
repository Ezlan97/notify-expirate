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

Route::get('/', 'PageController@welcome')->name('welcome');

Auth::routes();

Route::post('home/update-profile', 'UserController@updateProfile')->name('updateProfile');

Route::post('home/create-reminder', 'ReminderController@createReminder')->name('createReminder');

Route::get('/home', 'HomeController@index')->name('home');

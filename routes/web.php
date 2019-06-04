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
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'ProjectsController@index')->name('dashboard');

Route::get('/projects/create', 'ProjectsController@create')->name('createProject');
Route::get('/projects/{projectid}', 'ProjectsController@show')->name('showProject');
Route::post('/projects', 'ProjectsController@store')->name('storeProject');
Route::delete('/projects', 'ProjectsController@destroy')->name('destroyProject');

Route::post('/timestamps', 'TimestampsController@store')->name('storeTimestamp');
Route::delete('/timestamps', 'TimestampsController@destroy')->name('destroyTimestamp');



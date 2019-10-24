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

use Dotenv\Regex\Success;

Auth::routes();

Route::get('/email', function(){
return new NewUserWelcomeMail();
});
Route::post('/follow/{user}', 'FollowsController@store');
//.......................................................................................................
Route::get('/','PostsController@index' );
Route::post('/p ', 'PostsController@store')->name('posts.store');
Route::get('/p/create ', 'PostsController@create')->name('posts.create');
Route::get('/p/{post} ', 'PostsController@show')->name('posts.show');

Route::get('/profiles/{user} ', 'ProfilesController@index')->name('profiles.show');
Route::get('/profiles/{user}/edit ', 'ProfilesController@edit')->name('profiles.edit');
Route::patch('/profiles/{user} ', 'ProfilesController@update')->name('profiles.update');

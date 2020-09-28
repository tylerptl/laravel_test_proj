<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/email', function() {
   return new \App\Mail\NewUserWelcomeMail();
});
Route::post('follow/{user}', 'FollowsController@store');
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'Postscontroller@index');
Route::get('/p/create', 'PostsController@create');
Route::post('/p', 'PostsController@store');
Route::get('/p/{post}', 'PostsController@show');    // '/p/{post} will conflict with /p/___ as it takes anything after /p/. Fix by moving it down.

Route::get('/profile/{user}', 'ProfilesController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfilesController@edit')->name('profile.edit');    // shows edit form
Route::patch('/profile/{user}', 'ProfilesController@update')->name('profile.update');   // carries out edit process

//Route::get('/home', 'ProfilesController@index')->name('home');

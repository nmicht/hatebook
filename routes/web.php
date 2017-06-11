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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', 'PostController', [
    'middleware' => 'App\Http\Middleware\BannedUsers',
]);

Route::get('interactions', 'UserController@interactions')->name('interactions');

Route::get('/home', 'HomeController@index')->name('home');

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

Route::get('', 'HomeController@index')->name('home');

Route::livewire('tests/{test:slug}', 'tests.show')->name('tests.show');

Route::get('users/{user}', 'UserController@show')->name('users.show');

Route::middleware('guest')->group(function () {
    Route::get('auth', 'AuthController@redirectToProvider')->name('auth');
    Route::get('auth/callback', 'AuthController@handleProviderCallback')->name('auth.callback');
});

Route::middleware('auth')->group(function () {
    Route::post('auth/logout', 'AuthController@logout')->name('auth.logout');
});

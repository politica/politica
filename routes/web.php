<?php

use App\Http\Controllers\AuthController;
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

Route::livewire('partners', 'partners.index')->name('partners.index');
Route::livewire('partners/{partner:slug}', 'partners.show')->name('partners.show');

Route::livewire('test', 'test')->name('test');

Route::livewire('results/{result}', 'results.show')->name('results.show');

Route::get('users/{user}', 'UserController@show')->name('users.show');

Route::middleware('auth')->group(function () {
    Route::get('results/{result}/claim', 'ResultClaimsController')->name('results.claim')->middleware('signed');
});

Route::name('auth.')->prefix('auth')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::livewire('', 'auth')->name('index');
        Route::get('providers/discord/callback', [AuthController::class, 'handleDiscordCallback'])->name('providers.discord.callback');
        Route::get('providers/twitter/callback', [AuthController::class, 'handleTwitterCallback'])->name('providers.twitter.callback');
    });

    Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
});

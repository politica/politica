<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('', function () {
    Cache::add('questionsAnswered', \App\Models\Result::sum('questions_answered'), 60);
    Cache::add('testsTaken', \App\Models\Result::count(), 60);

    return view('home', [
        'partners' => \App\Models\Partner::limit(8)->get(),
        'questionsAnswered' => cache('questionsAnswered'),
        'testsTaken' => cache('testsTaken'),
    ]);
})->name('home');

Route::get('partners', App\Http\Livewire\Partners\Index::class)->name('partners.index');
Route::get('partners/{partner:slug}', App\Http\Livewire\Partners\Show::class)->name('partners.show');

Route::get('test', App\Http\Livewire\Test::class)->name('test');

Route::get('results/{result}', App\Http\Livewire\Results\Show::class)->name('results.show');

Route::get('users/{user}', function (\App\Models\User $user) {
    return view('users.show', [
        'user' => $user,
    ]);
})->name('users.show');

Route::middleware('auth')->group(function () {
    Route::get('results/{result}/claim', function (\App\Models\Result $result) {
        if (! $result->user) {
            $result->user()->associate(user());
            $result->save();
        }

        return redirect()->route('results.show', ['result' => $result]);
    })->name('results.claim')->middleware('signed');
});

Route::name('auth.')->prefix('auth')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('', function () {
            return redirect(Socialite::driver('discord')->redirect()->getTargetUrl().'&prompt=none');
        })->name('index');
        Route::get('providers/discord/callback', function () {
            $details = Socialite::driver('discord')->user();

            if ($details->getAvatar()) {
                $avatarPath = 'avatars/'.Str::afterLast($details->getAvatar(), '/');

                try {
                    $avatar = file_get_contents($details->getAvatar());
                } catch (\Exception $exception) {
                    $avatarPath = false;
                }

                if ($avatarPath) Storage::put($avatarPath, $avatar);
            }

            $user = \App\Models\User::updateOrCreate([
                'discord_id' => $details->getId(),
            ], [
                'avatar' => $avatarPath ?: null,
                'email' => $details->getEmail(),
                'name' => $details->getName(),
            ]);

            auth()->login($user, true);

            return redirect()->intended();
        })->name('providers.discord.callback');
        // Route::get('providers/twitter/callback', [AuthController::class, 'handleTwitterCallback'])->name('providers.twitter.callback');
    });

    Route::post('logout', function () {
        auth()->logout();

        return redirect('/');
    })->name('logout')->middleware('auth');
});

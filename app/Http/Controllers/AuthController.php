<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('discord')->redirect();
    }

    public function handleProviderCallback()
    {
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

        $user = User::updateOrCreate([
            'discord_id' => $details->getId(),
        ], [
            'avatar' => $avatarPath ?: null,
            'email' => $details->getEmail(),
            'name' => $details->getName(),
        ]);

        auth()->login($user, true);

        return redirect()->intended(route('home'));
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('home');
    }
}

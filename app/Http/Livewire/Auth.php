<?php

namespace App\Http\Livewire;

use Laravel\Socialite\Facades\Socialite;
use Livewire\Component;

class Auth extends Component
{
    public function mount()
    {
        if (session()->has('auth-provider')) {
            $this->redirectToProvider(session('auth-provider'));

            session()->forget('auth-provider');

            return;
        }
    }

    public function redirectToProvider($provider)
    {
        return redirect(Socialite::driver($provider)->redirect()->getTargetUrl().'&prompt=none');
    }

    public function render()
    {
        return view('auth');
    }
}

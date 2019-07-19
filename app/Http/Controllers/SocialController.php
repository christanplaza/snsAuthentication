<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $getInfo = $provider == 'google' ? Socialite::driver($provider)->stateless()->user() : Socialite::driver($provider)->user();
        $existingUser = User::where('email', $getInfo->email)->first();
        if ($existingUser && $existingUser->provider != $provider) {
            return redirect('/login')->with('message', 'User with the same email already exists!')->with('email', $getInfo->email)->with('provider', $existingUser->provider);
        }
        $user = $this->createUser($getInfo, $provider);
        auth()->login($user);

        return redirect()->to('/home');
    }

    protected function createUser($getInfo, $provider) {
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user = User::create([
                'name' => $getInfo->name,
                'email' => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id
            ]);
        }

        return $user;
    }
}

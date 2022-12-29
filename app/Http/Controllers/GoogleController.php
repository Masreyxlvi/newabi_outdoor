<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackGoogle()
    {
        try {
            $google_user =  Socialite::driver('google')->user();

            $user = User::where('google_id', $google_user->getId())->first();

            if(!$user){

                $new_user = User::create([
                    'name' => $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                    'status' => 'user',
                    'avatar' => $google_user->avatar,
                ]);

                Auth::login($new_user);

                return redirect()->intended('/');

            }else{
                Auth::login($user);

                return redirect()->intended('/');
            }
        } catch (\Throwable $th) {
            dd('Ada Kesalahan' . $th->getMessage());
        }
    }
}

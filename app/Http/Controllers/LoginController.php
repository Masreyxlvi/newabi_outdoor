<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facedes\Socialite;

class LoginController extends Controller
{
    /**
     * menampilkan halaman login  
     */
    public function index()
    {
        return view('login',[
            'title' => 'Login'
        ]);
    }

    /**
     * melakukan pengecekan apakah data Request sesuai dengan data di database
     *  */ 
    public function authenticate(Request $request)
    {
        $login =$request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);



        if(Auth::attempt($login))
        {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('error', 'Login Failed!');
    }

    /*
    * menghapus session dan redirect ke halaman login
     */ 
    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();
    
        return redirect('/login');
    }

    // public function redirectToGoogle()
    // {
    //     return Socialite::driver('google')->redirect();
    // }

    // public function handleGoogleCallback()
    // {
    //     return Socialite::driver('google')->user();

    //     $this->_registerOrLoginUser($user);
    //     return redirect('/');
    // }

    // public function redirectToFacebook()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }

    // public function handleFacebookCallback()
    // {
    //     return Socialite::driver('facebook')->user();
    // }

    // protected function _registerOrLoginUser($data)
    // {
    //     $user = User::where('email', '=', $data->email)->first();
    //     if(!$user){
    //         $user = new User();
    //         $user->username = $data->name;
    //         $user->email = $data->email;
    //         $user->provider_id = $data->id;
    //         $user->avatar = $data->avatar;
    //         $user->status = "user";
    //         $user->save();
    //     }

    //     Auth::login($user);
        
    // }
}

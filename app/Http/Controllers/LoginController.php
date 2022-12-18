<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    
        return redirect('/');
    }
}

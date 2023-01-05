<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
        ]);

        $validate['password'] = Hash::make($validate['password']);
        $validate['status'] = 'user';

        User::create($validate);

        return redirect('/login')->with('succes', 'Registration Success');
    }
}

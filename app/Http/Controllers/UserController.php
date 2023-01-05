<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function editAlamat(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'alamat_detail' => 'required',
        ]);

        $validate['email'] = Auth::user()->email;
        // dd($validate);

        User::where('id', Auth::id())
                ->update($validate);

        return redirect()->back()->with('success', "Alamat Berhasil Ditambahakan");
    }
}

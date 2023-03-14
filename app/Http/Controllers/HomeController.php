<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $produks = Produk::paginate(6);
        $kategoris = Kategori::all();
        $title = "Home";
        return view('home' , compact('produks', 'kategoris', 'title' ) );
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        // $produks = Produk::paginate(9);
        $kategoris = Kategori::all();
        return view('categories' , compact('kategoris' ) );
    }

    public function show(Kategori $kategori)
    {
        return view('categori', [
            'kategori' => $kategori->nama_kategori,
            'produks' => $kategori->produks
        ]);
    }
}

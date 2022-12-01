<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProduksController extends Controller
{
    public function index()
    {
        $produks = Produk::paginate(9);
        $kategoris = Kategori::all();
        return view('products' , compact('produks', 'kategoris' ) );
    }

    public function show(Produk $produk)
    {
        return view('product', [
            'produk' => $produk
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProduksController extends Controller
{
    public function index()
    {
        
        return view('products' ,[
            "produks" => Produk::with('kategori')->latest()->get(),
            "title" => "PRODUCT HIGHLIGHTS",
        ] );
    }

    public function show(Produk $produk)
    {
        return view('product', [
            'title' => "Relate Product",
            'produk' => $produk,
            "produks" => Produk::with(['kategori', 'detail_pesanan'])->latest()->get(),
        ]);
    }

   
}

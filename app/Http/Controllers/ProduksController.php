<?php

namespace App\Http\Controllers;

use App\Imports\ProdukImport;
use App\Models\DetailPesanan;
use App\Models\Kategori;
use App\Models\Pesanan;
use App\Models\Produk;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ProduksController extends Controller
{
    public function index()
    {
        $title = "";
        if(request('kategori')){
            $kategori = Kategori::firstWhere('nama_kategori', request('kategori'));
            $title = ' Categori : ' . $kategori->nama_kategori;
        }
        return view('products',[
            'title' => "ALL PRODUCT" . $title,
            'produks' => Produk::latest()->filter(request(['search', 'kategori']))->get()
        ]);
    }

    public function show(Produk $produk)
    {
        $images = $produk->images;
        return view('product', [
            'title' => 'Single Product',
            'relate' => 'Relate Product',
            'produk' => $produk,
            'images' => $images,
            'produks' => Produk::with(['kategori', 'images', 'detail_pesanan'])->paginate(6),
        ]);
    }

    public function import(Request $request)
    { 
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx',
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file', $nama_file);

        // import data
        Excel::import(new ProdukImport(), public_path('/file/' . $nama_file));

        // alihkan halaman kembali
        return redirect('/dashboard/produk')->with('succes', 'Import Has Been Succes');
    }
}

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

    public function import(Request $request) 
    {
        $this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('file',$nama_file);
 
		// import data
		Excel::import(new ProdukImport, public_path('/file/'.$nama_file));
      
 
		// alihkan halaman kembali
		return redirect('/dashboard/produk')->with('succes', 'Import Has Been Succes');
    }

   
}

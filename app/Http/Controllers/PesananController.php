<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;

class PesananController extends Controller
{

    public function store(Request $request, Produk $produk)
    {
        $produks = Produk::where('nama_produk', $produk->nama_produk)->first();

        $validate = $request->validate([
            'tgl_pesan' => 'required|date',
            'batas_waktu' => 'required|date',
        ]);      
      
        $cek_pesanan_baru = Pesanan::where('status', 'belum_checkout')->first();
        if(empty($cek_pesanan_baru)) {
            $validate['kode_pesanan'] = Pesanan::createInvoice();
            $validate['status'] = "belum_checkout";
            $validate['total_bayar'] = 0;    
            $input_pesanan = Pesanan::create($validate);
            
        }


        $pesanan_baru = Pesanan::where('status', 'belum_checkout')->first();

        $produk_id = $produks->id;
        $pesanan_id = $pesanan_baru->id;
        $qty = $request->qty;
        $lama_pesan = $request->lama_pesan;
        $jumlah_harga = $produks->harga*$lama_pesan*$qty;


       

        // cek detail pesanan
        $cek_detail_pesanan = DetailPesanan::where('produk_id', $produks->id)->where('pesanan_id', $pesanan_baru->id)->first();

        if(empty($cek_detail_pesanan)) {
            $validate['pesanan_id'] = $pesanan_id;
            $validate['produk_id'] = $produk_id;
            $validate['lama_pesan'] = $lama_pesan;
            $validate['qty'] = $qty;
            $validate['jumlah_harga'] = $jumlah_harga;
            $input_detail_pembelian =  DetailPesanan::create($validate);

        }else{
            $detail_pesanan = DetailPesanan::where('produk_id', $produks->id)->where('pesanan_id', $pesanan_baru->id)->first();
    
            $detail_pesanan->qty = $request->qty+$detail_pesanan->qty;
            $detail_pesanan->lama_pesan = $request->lama_pesan+$detail_pesanan->lama_pesan;
    
            $jumlah_harga = $produks->harga*$lama_pesan*$qty;
            $detail_pesanan->jumlah_harga = $detail_pesanan->jumlah_harga+$jumlah_harga;
            $detail_pesanan->update();           
        }
        
        $pesanan = Pesanan::where('status', 'belum_checkout')->first();
        $pesanan->total_bayar = $pesanan->total_bayar+$produks->harga*$request->lama_pesan*$request->qty;
        $pesanan->update();

        return redirect('/check_out')->with('succes', 'Pesanan Masuk Keranjang');  
        
    }

    public function check_out()
    {
        $pesanan = Pesanan::where('status', "belum_checkout")->first(); 
        $produks = Produk::all(); 
        $DetailPesanans = DetailPesanan::where('pesanan_id', $pesanan->id)->get();
        
        return view('/check_out', compact(['pesanan', 'DetailPesanans', 'produks']));
    }

    public function delete($id)
    {
        $detail_pesanan = DetailPesanan::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $detail_pesanan->pesanan_id)->first();
        $pesanan->total_bayar = $pesanan->total_bayar-$detail_pesanan->jumlah_harga;
        $pesanan->update();

        $detail_pesanan->delete();

        return redirect('/check_out')->with('hapus', 'Pesanan Masuk Keranjang');  

    }
}

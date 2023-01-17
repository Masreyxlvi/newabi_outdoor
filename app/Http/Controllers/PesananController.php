<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\District;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{

    public function store(Request $request, Produk $produk)
    {
        $produks = Produk::where('nama_produk', $produk->nama_produk)->first();

        if($request->qty > $produk->stok){
            return redirect()->back()->with('error', 'Stok Habis');
        }
        $validate = $request->validate([
            'jaminan' => 'nullable',
        ]);      


      
        $cek_pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 'belum_checkout')->first();
        if(empty($cek_pesanan_baru)) {
            $validate['kode_pesanan'] = Pesanan::createInvoice();
            $validate['status'] = "belum_checkout";
            $validate['user_id'] = Auth::user()->id;
            $validate['total_bayar'] = 0;    
            $input_pesanan = Pesanan::create($validate);
            
        }


        $pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status', 'belum_checkout')->first();

        $data = $request->all();
        $produk_id = $produks->id;
        $pesanan_id = $pesanan_baru->id;
        $qty = $data['qty'];
        $tanggal = Carbon::parse($data['tanggal']) ;
        $waktu = Carbon::parse($data['waktu']);
        $drop_date = Carbon::parse($data['date_drop']) ;
        $drop_time = Carbon::parse($data['time_drop']);
        $tgl_pesan = Carbon::parse($tanggal->format('d F Y'). '' . $waktu->format('H:i'));
        $batas_waktu = Carbon::parse($drop_date->format('d F Y'). '' . $drop_time->format('H:i'));
        $lama_pesan = $data['lama_pesan'];
        $jumlah_harga = $produks->harga*$lama_pesan*$qty;


       

        // cek detail pesanan
        $cek_detail_pesanan = DetailPesanan::where('produk_id', $produks->id)->where('pesanan_id', $pesanan_baru->id)->first();

        if(empty($cek_detail_pesanan)) {
            $validate['pesanan_id'] = $pesanan_id;
            $validate['produk_id'] = $produk_id;
            $validate['lama_pesan'] = $lama_pesan;
            $validate['qty'] = $qty;
            $validate['tgl_pesan'] = $tgl_pesan;
            $validate['batas_waktu'] = $batas_waktu;
            $validate['jumlah_harga'] = $jumlah_harga;
            $input_detail_pembelian =  DetailPesanan::create($validate);

        }else{
            $detail_pesanan = DetailPesanan::where('produk_id', $produks->id)->where('pesanan_id', $pesanan_baru->id)->first();
    
            $detail_pesanan->qty = $request->qty+$detail_pesanan->qty;
            $detail_pesanan->lama_pesan = $request->lama_pesan;
            $detail_pesanan->tgl_pesan = $tgl_pesan;
            $detail_pesanan->batas_waktu = $batas_waktu;
    
            $jumlah_harga = $produks->harga*$lama_pesan*$qty;
            $detail_pesanan->jumlah_harga = $detail_pesanan->jumlah_harga+$jumlah_harga;
            $detail_pesanan->update();           
        }
        
        $pesanan = Pesanan::where('status', 'belum_checkout')->where('user_id', Auth::user()->id)->first();
        $pesanan->total_bayar = $pesanan->total_bayar+$produks->harga*$request->lama_pesan*$request->qty;
        $pesanan->update();

        return redirect('/check_out')->with('succes', 'Pesanan Masuk Keranjang');  
        
    }

    public function check_out()
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', "belum_checkout")->first(); 
        if(!empty($pesanan)) {
            $DetailPesanans = DetailPesanan::where('pesanan_id', $pesanan->id)->get();
            return view('/check_out', compact(['pesanan', 'DetailPesanans']));
        }
        return view('/check_out');
        
    }

    public function delete($id)
    {
        $detail_pesanan = DetailPesanan::where('id', $id)->first();
        // dd($detail_pesanan);

        $pesanan = Pesanan::where('id', $detail_pesanan->pesanan_id)->first();
        $pesanan->total_bayar = $pesanan->total_bayar-$detail_pesanan->jumlah_harga;
        $pesanan->update();

        $detail_pesanan->delete();

        return redirect('/check_out')->with('hapus', 'Pesanan Masuk Keranjang');  

    }

    public function konfirmasi(Request $request)
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', "belum_checkout")->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = "sudah_checkout";
        $pesanan->jaminan = $request->jaminan;
        $pesanan->update();

        $detail_pesanans = DetailPesanan::where('pesanan_id', $pesanan_id)->get();
        foreach ($detail_pesanans as $detail_pesanan) {
            $produk = Produk::where('id', $detail_pesanan->produk_id)->first();
            $produk->stok = $produk->stok-$detail_pesanan->qty;
            $produk->update(); 
        }

        return redirect('/faktur/'.$pesanan->kode_pesanan)->with('succes', 'Pesanan Masuk Keranjang');  
    }

    public function riwayat()
    {
        // $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status', "sudah_checkout")->first(); 
        // if(!empty($pesanan)) {
        //     $DetailPesanans = DetailPesanan::where('pesanan_id', $pesanan->id)->get();
        // }
        
        return view('/riwayat', [
            'pesanans' => Pesanan::where('user_id', Auth::user()->id)->where('status', "sudah_checkout")->latest()->get()
        ]);
    }

    public function faktur(Pesanan $pesanan)
    {
        $data = array(
            'pesanan' => Pesanan::where('kode_pesanan', $pesanan->kode_pesanan)->first(),
            'title' => 'Faktur'
        );
        $pesanan->load(['detailPesanan']);
        return view('/faktur')->with($data);
    }

}

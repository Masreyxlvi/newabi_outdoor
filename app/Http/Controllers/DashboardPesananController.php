<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.pesanan.index', [
            'pesanans' => Pesanan::with('DetailPesanan.produk')->latest()->get(),
            'title' => 'Pesanan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesanan $pesanan)
    {
        //
    }

    public function faktur(Pesanan $pesanan)
    {
        $data = array(
            'pesanan' => Pesanan::where('kode_pesanan', $pesanan->kode_pesanan)->first(),
            'title' => 'Faktur'
        );
        $pesanan->load(['detailPesanan', 'user']);
        return view('dashboard.pesanan.faktur')->with($data);
    }

    public function cetakPdf(Pesanan $pesanan, $id)
    {
        $pesanan = Pesanan::find($id);

        $pesanan->load(['detailPesanan', 'user']);

        $pdf = PDF::loadView('dashboard.pesanan.cetakPdf', compact('pesanan', $pesanan));

        return $pdf->stream();
    }

    public function diskon(Request $request, Pesanan $pesanan)
    {
        $pesanan = Pesanan::where('kode_pesanan', $pesanan->kode_pesanan)->where('pickup', "jasa_antar")->first();
        // dd($pesanan);
        $pesanan->ongkir =  $request->ongkir;
        $pesanan->total_bayar = $pesanan->total_bayar + $request->ongkir;
        // dd($pesanan->total_bayar);
        
        $pesanan->update();

        return redirect()->back()->with('succes', 'Ongkir Ditambahkan');

    }
}

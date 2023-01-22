<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.produk.index', [
            'produks' => Produk::latest()->get(),
            'kategoris' => Kategori::all(),
            'title' => "PRODUK"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.produk.create', [
            // 'produks' => Produk::latest()->get(),
            'kategoris' => Kategori::all(),
            'title' => "PRODUK"
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_produk' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'gambar1' => 'required|file|max:2048',
            'keterangan' => 'required'
        ]);

        if($request->file('gambar1')) {
            $validate['gambar1'] = $request->file('gambar1')->store('produk-image');
        }

        Produk::create($validate);

        return redirect('/dashboard/produk')->with('succes', 'Data Berhasil Ditambahkan');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,Produk $produk)
    {
        return view('/dashboard/produk/edit', [
            'kategoris' => Kategori::all(),
            'title' => "PRODUK",
            'produk' => $produk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $validate = $request->validate([
            'nama_produk' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'gambar1' => 'required|file|max:2048',
            'keterangan' => 'required'
        ]);

        if($request->file('gambar1')) {
            if($request->oldGambar) {
                Storage::delete($request->oldGambar);
            }
            $validate['gambar1'] = $request->file('gambar1')->store('produk-image');
        }
        // dd($validate);

        Produk::where('id', $produk->id)
                    ->update($validate);

        return redirect('/dashboard/produk')->with('succes', 'Data Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        if($produk->gambar1){
            Storage::delete($produk->gambar1);
        }
        Produk::destroy($produk->id);

        return redirect()->back()->with('succes', 'Data Berhasil Dihapus');
    }
}

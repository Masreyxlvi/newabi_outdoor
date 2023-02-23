<?php

namespace App\Http\Controllers;

use App\Models\Image;
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
            // 'gambar1' => 'required|file|max:2048',
            'keterangan' => 'required'
        ]);

        // if($request->file('gambar1')) {
        //     $validate['gambar1'] = $request->file('gambar1')->store('produk-image');
        // }

        $new_product = Produk::create($validate);

        if($request->has('images')) {
            $images = $request->file('images');
            $is_main = true;
            foreach( $images as $image){
                $imageName = $validate['nama_produk'].'-image'.time().rand(1,1000).'.'.$image->extension();
                $path = $image->store('produk-image');
                // dd($image);
                Image::create([
                    'produk_id' => $new_product->id,
                    'image' => $path,
                    'is_main' => $is_main
                ]);
                $is_main = false;
            }
        }
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
        $produk = Produk::find($id);
        if(!$produk) abort(404);
        $images = $produk->images;

        $title = "View";
        return view('dashboard/produk/show', compact('produk', 'images', 'title'));
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
    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return redirect()->back();
        }
    
        // Update data produk
        $produk->update($request->all());
    
        // Handle upload gambar
        if ($request->hasFile('images')) {
            // Hapus gambar sebelumnya
            $images = $produk->images;
            foreach ($images as $image) {
                $image->delete();
            }
    
            // Upload gambar baru
            $images = $request->file('images');
            $is_main = true;
            foreach ($images as $image) {
                // $path = $image->store('produk-image');
                $image = Image::create([
                    'produk_id' => $id,
                    'image' => $image->store('produk-image'),
                    'is_main' => $is_main
                ]);
                $is_main = false;
            }
        }
    
        return redirect('/dashboard/produk')->with('succes', 'Data Berhasil DiEdit');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        // if($produk->gambar1){
        //     Storage::delete($produk->gambar1);
        // }
        Produk::destroy($produk->id);

        return redirect()->back()->with('succes', 'Data Berhasil Dihapus');

    }
}

<?php

namespace App\Imports;

use App\Models\Kategori;
use App\Models\Produk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProdukImport implements ToModel,  WithHeadingRow
{


    public function model(array $row)
    {
        // $kategoriId = null;
        // $kategori = Kategori::where('id', $row['kategori_id'])->first();
        // if ($kategori) {
        //     $kategoriId = $kategori->id;
        // } 
        return new Produk([
            'nama_produk' => $row['nama_produk'],
            'kategori_id' => $row['kategori_id'],
            'harga' => $row['harga'],
            'stok' => $row['stok'],
            'keterangan' => $row['deskripsi']
        ]);
    }
}

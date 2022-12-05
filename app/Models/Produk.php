<?php

namespace App\Models;

// use app\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function detail_pesanan()
    {
        return $this->hasMany(DetailPesanan::class);
    }
}

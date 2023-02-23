<?php

namespace App\Models;

// use app\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];



    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where('nama_produk', 'like', '%'. $search . '%')
                        ->orWhere('keterangan', 'like', '%' . $search . '%');
        });

        $query->when($filters['kategori'] ?? false, fn($query, $kategori) =>
            $query->whereHas('kategori', fn($query) =>
                $query->where('nama_kategori', $kategori)
            )
        );
    }
    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function detail_pesanan()
    {
        return $this->hasMany(DetailPesanan::class);
    }
    
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function mainImage()
    {
        return $this->images()->where('is_main', 1)->first();
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($produk) {
            $images = $produk->images;
            foreach ($images as $image) {
                $image->delete();
            }
        });
    }

}

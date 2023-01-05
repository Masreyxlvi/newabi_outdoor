<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Pesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function DetailPesanan()
    {
        return $this->hasMany(DetailPesanan::class, 'pesanan_id');
    }

    public static function createInvoice()
    {
        // $lastNumber = self::selectRaw("IFNULL(MAX(SUBSTRING(`kode_pesanan`,9,5)),0) + 1 AS last_number")->whereRaw("SUBSTRING(`kode_pesanan`,1,4) = '" . date('Y') . "'")->whereRaw("SUBSTRING(`kode_pesanan`,5,2) = '" . date('m') . "'")->orderBy('last_number')->first()->last_number;
        // $invoice =  date("Ymd") . sprintf("%'.05d", $lastNumber);
        // return $invoice;

        $tahun = date("Y");
        $prefix = strtoupper(substr("NWB", 0, 3));
        $no_urut = self::selectRaw("IFNULL(MAX(SUBSTRING(`kode_pesanan`,8,4)),0) + 1 AS no_urut")->whereRaw("SUBSTRING(`kode_pesanan`,4,4) = '" . $tahun . "'")->whereRaw("SUBSTRING(`kode_pesanan`,1,3) = '" . $prefix . "'")->orderBy('no_urut')->first()->no_urut;
        $invoice = $prefix . $tahun . sprintf("%'.04d", $no_urut);
        return $invoice;
    } 

    public function getTglPesanAttribute()
    {
        return Carbon::parse($this->attributes['tgl_pesan'])->translatedFormat('d F Y H i');
    }

    public function getBatasWaktuAttribute()
    {
        return Carbon::parse($this->attributes['batas_waktu'])->translatedFormat('d F Y');
    }
}

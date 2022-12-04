<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        $lastNumber = self::selectRaw("IFNULL(MAX(SUBSTRING(`kode_pesanan`,9,5)),0) + 1 AS last_number")->whereRaw("SUBSTRING(`kode_pesanan`,1,4) = '" . date('Y') . "'")->whereRaw("SUBSTRING(`kode_pesanan`,5,2) = '" . date('m') . "'")->orderBy('last_number')->first()->last_number;
        $invoice =  date("Ymd") . sprintf("%'.05d", $lastNumber);
        return $invoice;
    } 
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detailpenjualan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_penjualan',
        'id_produk',
        'jumlah',
        'diskon',
        'subtotal',
    ] ;
    public function penjualan(){
        return $this->belongsTo(Penjualan::class,'id_penjualan','id');
    }
    public function produk(){
        return $this->belongsTo(Produk::class,'id_produk','id');
    }
}

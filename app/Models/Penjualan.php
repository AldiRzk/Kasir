<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'id_pelanggan',
        'tgl_penjualan',
        'total_harga',
    ];
    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class,'id_pelanggan', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class,'id_user', 'id');
    }
}

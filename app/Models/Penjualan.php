<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';
    protected $primaryKey = 'id';
    protected $fillable = [  'id_barang', 'id_pelayan', 'id_pembayaran', 'satuan', 'tanggal', 'harga_barang', 'jml_beli', 'total_harga'
];


    public function user()
    {
        return $this->belongsTo (User::class, 'id_pelayan','id_pelayan');
}
    public function barang()
    {
        return $this->belongsTo (Barang::class, 'id_barang', 'id_barang');
    }
    public function pembayaran()
    {
        return $this->belongsTo (Pembayaran::class, 'id_pembayaran', 'id_pembayaran');
    }
}
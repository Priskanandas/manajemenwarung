<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Barang = Barang::create([
          'id_kategori'=> 1,
           'nama_barang'=> 'aqua',
           'satuan'=> 'pcs',
           'kategori'=> 'Minuman',
           'kd_barang'=> 'aq1',
           'stok'=> 1,
           'total_barang'=> 20,
           'harga_ecer'=> 3500,
           'harga_grosir'=> 70000
        ]);
    }
}

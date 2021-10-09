<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 37; $i++) {
            DB::table('produk')->insert([
                'kode_produk' => 'gfs',
                'id_inventory' => 0,
                'no_seri' => '089123',
                'nama_produk' => 'aibon',
                'photo_produk' => 'jpg',
                'jenis_produk' => 'lem',
                'kategori_produk' => "lem",
                'barcode' => '23498',
                'harga' => '8000',
                'modal' => '80000',
                'dimensi' => 3,
                'berat' => '3kg',
                'unit_pembelian' => 23,
                'lokasi_gudang' => 'a',
                'lokasi_rak' => 1,
                'lokasi_barisRak' => 1,
                'lokasi_kolomRak' => 2,
                'qty' => 10
            ]);
        }
    }
}

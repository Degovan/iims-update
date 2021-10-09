<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->integer('id_produk', true);
            $table->integer('id_inventory');
            $table->string('kode_produk', 50);
            $table->string('no_seri', 50);
            $table->string('nama_produk', 50);
            $table->string('photo_produk', 50);
            $table->string('jenis_produk', 50);
            $table->string('kategori_produk', 50);
            $table->string('barcode', 50);
            $table->integer('harga');
            $table->integer('modal');
            $table->string('dimensi', 50);
            $table->string('berat', 50);
            $table->string('unit_pembelian', 50);
            $table->string('lokasi_gudang', 50);
            $table->string('lokasi_rak', 50);
            $table->string('lokasi_barisRak', 50);
            $table->string('lokasi_kolomRak', 50);
            $table->integer('qty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}

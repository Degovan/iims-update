<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->integer('id_customer', true);
            $table->string('nama_customer', 50);
            $table->string('alamat_customer', 50);
            $table->string('telepon', 20);
            $table->string('fax', 50);
            $table->string('email', 50);
            $table->string('customer_cp', 50);
            $table->string('nama', 50);
            $table->string('hp', 20);
            $table->string('catatan', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}

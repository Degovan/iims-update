<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cp', function (Blueprint $table) {
            $table->integer('id_cp', true);
            $table->string('nama', 50);
            $table->integer('hp');
            $table->string('email', 50);
            $table->integer('id_vendor');

            $table->foreign('id_vendor')->references('id_vendor')->on('vendor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cp');
    }
}

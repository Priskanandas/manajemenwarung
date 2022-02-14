<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_kategori')->nullable();
            $table->string('nama_barang');
            $table->string('satuan')->nullable();
            $table->string('kategori')->nullable();
            $table->string('kd_barang');
            $table->integer('stok');
            $table->integer('total_barang');
            $table->integer('harga_ecer');
            $table->integer('harga_grosir');
            $table->timestamps();
        });
            Schema::table('barang', function($table) {

            $table->foreign('id_kategori')->references('id')->on('kategori');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}

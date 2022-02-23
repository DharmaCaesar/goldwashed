<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Barventaris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barventaris', function(Blueprint $table) {
            $table -> id();
            $table -> string('nama_barang');
            $table -> string('merk_barang');
            $table -> integer('qty');
            $table -> enum('kondisi', ['Normal', 'Minus', 'Broke']);
            $table -> date('tanggal_pengadaan');
            $table -> timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang_inventaris');
    }
}

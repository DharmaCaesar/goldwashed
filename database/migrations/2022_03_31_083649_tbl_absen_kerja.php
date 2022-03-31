<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblAbsenKerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absen', function (Blueprint $table) {
            $table->id();
            $table->string('nama_karyawan');
            $table->date('tanggal_masuk');
            $table->time('waktu_masuk_kerja');
            $table->enum('status', ['MASUK', 'SAKIT', 'CUTI']);
            $table->time('waktu_akhir_kerja');
            $table->timestamps();
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absen');
    }
}

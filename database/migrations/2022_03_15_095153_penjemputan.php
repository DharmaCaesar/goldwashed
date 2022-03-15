<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Penjemputan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjemputan', function (Blueprint $table) {
            $table->id();
            $table->id('members_id');
            $table->string('member_name', 100);
            $table->text('member_address');
            $table->string('member_phone', 16);
            $table->string('petugas_penjemputan', 100);
            $table->enum('status', ['TERCATAT', 'PENJEMPUTAN', 'SELESAI']);
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
        Schema::dropIfExists('penjemputan');
    }
}

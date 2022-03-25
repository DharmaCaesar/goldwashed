<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Datab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datab', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->integer('qty');
            $table->integer('price');
            $table->dateTime('buydate');
            $table->string('supply');
            $table->enum('status', ['REQUESTED', 'SOLDOUT', 'AVAILABLE']);
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
        Schema::dropIfExists('datab');
    }
}

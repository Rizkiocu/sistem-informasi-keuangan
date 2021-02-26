<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUangkeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uangkeluar', function (Blueprint $table) {
            $table->increments('id_keluar');
            $table->string('pj', 100);
            $table->date('tgl_keluar');
            $table->string('jenis', 100);
            $table->integer('spp');
            $table->integer('ekstra');
            $table->integer('buku');
            $table->integer('psb');
            $table->integer('tasyakuran');
            $table->integer('sumbangan_buku');
            $table->integer('ujian');
            $table->integer('un');
            $table->integer('tunggakan');
            $table->integer('jumlah');
            $table->string('ket', 255)->nullable();
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
        Schema::dropIfExists('uangkeluar');
    }
}

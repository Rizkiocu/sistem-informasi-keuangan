<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUangmasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uangmasuk', function (Blueprint $table) {
            $table->increments('id_masuk');
            $table->string('nis', 20);
            $table->string('nama_santri', 100);
            $table->date('tgl_masuk');
            $table->string('kelas', 30);
            $table->string('no_hp');
            $table->integer('spp');
            $table->integer('j_bulan');
            $table->integer('ekstra');
            $table->integer('buku');
            $table->integer('psb');
            $table->integer('tasyakuran');
            $table->integer('sumbangan_buku');
            $table->integer('ujian_1');
            $table->integer('ujian_2');
            $table->integer('un');
            $table->integer('tunggakan');
            $table->integer('total');
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
        Schema::dropIfExists('uangmasuk');
    }
}

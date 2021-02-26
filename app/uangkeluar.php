<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class uangkeluar extends Model
{
    protected $primaryKey = 'id_keluar';
    protected $table = "uangkeluar";
    protected $fillable = [
        'pj', 'tgl_keluar', 'jenis', 'spp',
        'ekstra',
        'buku',
        'psb',
        'tasyakuran',
        'sumbangan_buku',
        'ujian',
        'un',
        'tunggakan', 'jumlah', 'ket'
    ];
    public $timestamps = false;
}

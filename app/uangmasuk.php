<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class uangmasuk extends Model
{
    protected $primaryKey = 'id_masuk';
    protected $table = "uangmasuk";
    protected $fillable = [
        'nis',
        'nama_santri',
        'tgl_masuk',
        'kelas',
        'no_hp',
        'spp',
        'ekstra',
        'buku',
        'psb',
        'j_bulan',
        'tasyakuran',
        'sumbangan_buku',
        'ujian_1',
        'ujian_2',
        'un',
        'tunggakan',
        'total'
    ];
    public $timestamps = false;
}

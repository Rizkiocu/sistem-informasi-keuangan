<?php

namespace App\Http\Controllers;

use App\uangmasuk;
use App\uangkeluar;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Ramsey\Uuid\Uuid;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class dataController extends Controller
{
    public function index()
    {

        $bulan = date("m");
        $tahun = date("Y");
        $masuk = uangmasuk::whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("total");
        $keluar = uangkeluar::whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("jumlah");
        $tampil_masuk = uangmasuk::sum("total");
        $tampil_keluar = uangkeluar::sum("jumlah");
        return view('data_keuangan', ['keluar' => $keluar, 'masuk' => $masuk, 'tampil_masuk' => $tampil_masuk, 'tampil_keluar' => $tampil_keluar]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use App\uangkeluar;
use App\uangmasuk;
use PDF;

class l_uangkeluarController extends Controller
{
    public function index()
    {
        return view('v_uangkeluar');
    }

    public function cetak_uangkeluar_tahun(Request $request)
    {

        $tahun = $request->tahun;


        $uang_spp = uangkeluar::whereYear('tgl_keluar', $tahun)->sum("spp");
        $uang_ekstra = uangkeluar::whereYear('tgl_keluar', $tahun)->sum("ekstra");
        $uang_buku = uangkeluar::whereYear('tgl_keluar', $tahun)->sum("buku");
        $uang_psb = uangkeluar::whereYear('tgl_keluar', $tahun)->sum("psb");
        $uang_tasyakuran = uangkeluar::whereYear('tgl_keluar', $tahun)->sum("tasyakuran");
        $uang_sumbangan_buku = uangkeluar::whereYear('tgl_keluar', $tahun)->sum("sumbangan_buku");
        $uang_ujian = uangkeluar::whereYear('tgl_keluar', $tahun)->sum("ujian");
        $uang_un = uangkeluar::whereYear('tgl_keluar', $tahun)->sum("un");
        $uang_tunggakan = uangkeluar::whereYear('tgl_keluar', $tahun)->sum("tunggakan");

        $uangmasuk = uangmasuk::whereYear('tgl_masuk', $tahun)->sum("total");
        $jmlh = uangkeluar::whereYear('tgl_keluar', $tahun)->sum("jumlah");
        $uangkeluar = uangkeluar::whereYear('tgl_keluar', $tahun)->get();
        // dd($uangmasuk);
        $pdf = PDF::loadview('uangkeluar_tahun_pdf', ['uangkeluar' => $uangkeluar, 'jmlh' => $jmlh, 'uangmasuk' => $uangmasuk, 'uang_spp' => $uang_spp, 'uang_ekstra' => $uang_ekstra, 'uang_buku' => $uang_buku, 'uang_psb' => $uang_psb, 'uang_tasyakuran' => $uang_tasyakuran, 'uang_sumbangan_buku' => $uang_sumbangan_buku, 'uang_ujian' => $uang_ujian, 'uang_un' => $uang_un, 'uang_tunggakan' => $uang_tunggakan])->setPaper('legal', 'landscape');
        return $pdf->stream('laporan-uangkeluar-tahun-pdf');
    }

    public function cetak_uangkeluar_bulan(Request $request)
    {

        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $uang_spp = uangkeluar::whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("spp");
        $uang_ekstra = uangkeluar::whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("ekstra");
        $uang_buku = uangkeluar::whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("buku");
        $uang_psb = uangkeluar::whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("psb");
        $uang_tasyakuran = uangkeluar::whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("tasyakuran");
        $uang_sumbangan_buku = uangkeluar::whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("sumbangan_buku");
        $uang_ujian = uangkeluar::whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("ujian");
        $uang_un = uangkeluar::whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("un");
        $uang_tunggakan = uangkeluar::whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("tunggakan");

        $uangmasuk = uangmasuk::whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("total");
        $jmlh = uangkeluar::whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("jumlah");
        $uangkeluar = uangkeluar::whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->get();
        // dd($uangmasuk);
        $pdf = PDF::loadview('uangkeluar_bulan_pdf', ['uangkeluar' => $uangkeluar, 'jmlh' => $jmlh, 'uangmasuk' => $uangmasuk, 'uang_spp' => $uang_spp, 'uang_ekstra' => $uang_ekstra, 'uang_buku' => $uang_buku, 'uang_psb' => $uang_psb, 'uang_tasyakuran' => $uang_tasyakuran, 'uang_sumbangan_buku' => $uang_sumbangan_buku, 'uang_ujian' => $uang_ujian, 'uang_un' => $uang_un, 'uang_tunggakan' => $uang_tunggakan])->setPaper('legal', 'landscape');
        return $pdf->stream('laporan-uangkeluar-bulan-pdf');
    }

    public function cetak_uangkeluar_hari(Request $request)
    {

        $hari = $request->hari;
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $uang_spp = uangkeluar::whereDay('tgl_keluar', $hari)->whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("spp");
        $uang_ekstra = uangkeluar::whereDay('tgl_keluar', $hari)->whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("ekstra");
        $uang_buku = uangkeluar::whereDay('tgl_keluar', $hari)->whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("buku");
        $uang_psb = uangkeluar::whereDay('tgl_keluar', $hari)->whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("psb");
        $uang_tasyakuran = uangkeluar::whereDay('tgl_keluar', $hari)->whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("tasyakuran");
        $uang_sumbangan_buku = uangkeluar::whereDay('tgl_keluar', $hari)->whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("sumbangan_buku");
        $uang_ujian = uangkeluar::whereDay('tgl_keluar', $hari)->whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("ujian");
        $uang_un = uangkeluar::whereDay('tgl_keluar', $hari)->whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("un");
        $uang_tunggakan = uangkeluar::whereDay('tgl_keluar', $hari)->whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("tunggakan");

        $uangmasuk = uangmasuk::whereDay('tgl_masuk', $hari)->whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("total");
        $jmlh = uangkeluar::whereDay('tgl_keluar', $hari)->whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("jumlah");
        $uangkeluar = uangkeluar::whereDay('tgl_keluar', $hari)->whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->get();
        // dd($uangmasuk);
        $pdf = PDF::loadview('uangkeluar_hari_pdf', ['uangkeluar' => $uangkeluar, 'jmlh' => $jmlh, 'uangmasuk' => $uangmasuk, 'uang_spp' => $uang_spp, 'uang_ekstra' => $uang_ekstra, 'uang_buku' => $uang_buku, 'uang_psb' => $uang_psb, 'uang_tasyakuran' => $uang_tasyakuran, 'uang_sumbangan_buku' => $uang_sumbangan_buku, 'uang_ujian' => $uang_ujian, 'uang_un' => $uang_un, 'uang_tunggakan' => $uang_tunggakan])->setPaper('legal', 'landscape');
        return $pdf->stream('laporan-uangkeluar-hari-pdf');
    }
}

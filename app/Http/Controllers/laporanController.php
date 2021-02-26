<?php

namespace App\Http\Controllers;

use App\uangkeluar;
use Illuminate\Http\Request;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\DB;
use App\uangmasuk;
use PDF;

class laporanController extends Controller
{
    public function index()
    {
        return view('pertahun');
    }

    public function cetak_pdf(Request $request)
    {

        $tahun = $request->tahun;

        $uangkeluar = uangkeluar::whereYear('tgl_keluar', $tahun)->sum("jumlah");

        $spp = uangmasuk::whereYear('tgl_masuk', $tahun)->sum("spp");
        $ekstra = uangmasuk::whereYear('tgl_masuk', $tahun)->sum("ekstra");
        $buku = uangmasuk::whereYear('tgl_masuk', $tahun)->sum("buku");
        $psb = uangmasuk::whereYear('tgl_masuk', $tahun)->sum("psb");
        $tasyakuran = uangmasuk::whereYear('tgl_masuk', $tahun)->sum("tasyakuran");
        $sumbangan_buku = uangmasuk::whereYear('tgl_masuk', $tahun)->sum("sumbangan_buku");
        $ujian_1 = uangmasuk::whereYear('tgl_masuk', $tahun)->sum("ujian_1");
        $ujian_2 = uangmasuk::whereYear('tgl_masuk', $tahun)->sum("ujian_2");
        $un = uangmasuk::whereYear('tgl_masuk', $tahun)->sum("un");
        $tunggakan = uangmasuk::whereYear('tgl_masuk', $tahun)->sum("tunggakan");

        $uang_spp = uangkeluar::whereYear('tgl_keluar', $tahun)->sum("spp");
        $uang_ekstra = uangkeluar::whereYear('tgl_keluar', $tahun)->sum("ekstra");
        $uang_buku = uangkeluar::whereYear('tgl_keluar', $tahun)->sum("buku");
        $uang_psb = uangkeluar::whereYear('tgl_keluar', $tahun)->sum("psb");
        $uang_tasyakuran = uangkeluar::whereYear('tgl_keluar', $tahun)->sum("tasyakuran");
        $uang_sumbangan_buku = uangkeluar::whereYear('tgl_keluar', $tahun)->sum("sumbangan_buku");
        $uang_ujian = uangkeluar::whereYear('tgl_keluar', $tahun)->sum("ujian");
        $uang_un = uangkeluar::whereYear('tgl_keluar', $tahun)->sum("un");
        $uang_tunggakan = uangkeluar::whereYear('tgl_keluar', $tahun)->sum("tunggakan");

        $jmlh = uangmasuk::whereYear('tgl_masuk', $tahun)->sum("total");
        $uangmasuk = uangmasuk::whereYear('tgl_masuk', $tahun)->get();
        $tampil_masuk = uangmasuk::sum("total");
        $tampil_keluar = uangkeluar::sum("jumlah");
        // dd($uangmasuk);
        $pdf = PDF::loadview('uangmasuk_pdf', ['uangmasuk' => $uangmasuk, 'jmlh' => $jmlh, 'uangkeluar' => $uangkeluar, 'tampil_masuk' => $tampil_masuk, 'tampil_keluar' => $tampil_keluar, 'spp' => $spp, 'ekstra' => $ekstra, 'buku' => $buku, 'psb' => $psb, 'tasyakuran' => $tasyakuran, 'sumbangan_buku' => $sumbangan_buku, 'ujian_1' => $ujian_1, 'ujian_2' => $ujian_2, 'un' => $un, 'tunggakan' => $tunggakan, 'uang_spp' => $uang_spp, 'uang_ekstra' => $uang_ekstra, 'uang_buku' => $uang_buku, 'uang_psb' => $uang_psb, 'uang_tasyakuran' => $uang_tasyakuran, 'uang_sumbangan_buku' => $uang_sumbangan_buku, 'uang_ujian' => $uang_ujian, 'uang_un' => $uang_un, 'uang_tunggakan' => $uang_tunggakan])->setPaper('legal', 'landscape');
        return $pdf->stream('laporan-uangmasuk-tahun-pdf');
    }

    public function cetak_bulan_pdf(Request $request)
    {

        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $uangkeluar = uangkeluar::whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("jumlah");

        $spp = uangmasuk::whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("spp");
        $ekstra = uangmasuk::whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("ekstra");
        $buku = uangmasuk::whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("buku");
        $psb = uangmasuk::whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("psb");
        $tasyakuran = uangmasuk::whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("tasyakuran");
        $sumbangan_buku = uangmasuk::whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("sumbangan_buku");
        $ujian_1 = uangmasuk::whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("ujian_1");
        $ujian_2 = uangmasuk::whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("ujian_2");
        $un = uangmasuk::whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("un");
        $tunggakan = uangmasuk::whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("tunggakan");

        $uang_spp = uangkeluar::whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("spp");
        $uang_ekstra = uangkeluar::whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("ekstra");
        $uang_buku = uangkeluar::whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("buku");
        $uang_psb = uangkeluar::whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("psb");
        $uang_tasyakuran = uangkeluar::whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("tasyakuran");
        $uang_sumbangan_buku = uangkeluar::whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("sumbangan_buku");
        $uang_ujian = uangkeluar::whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("ujian");
        $uang_un = uangkeluar::whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("un");
        $uang_tunggakan = uangkeluar::whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("tunggakan");

        $jmlh = uangmasuk::whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("total");
        $uangmasuk = uangmasuk::whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->get();
        $tampil_masuk = uangmasuk::sum("total");
        $tampil_keluar = uangkeluar::sum("jumlah");
        // dd($uangmasuk);
        $pdf = PDF::loadview('uangmasuk_bulan_pdf', ['uangmasuk' => $uangmasuk, 'jmlh' => $jmlh, 'uangkeluar' => $uangkeluar, 'tampil_masuk' => $tampil_masuk, 'tampil_keluar' => $tampil_keluar, 'spp' => $spp, 'ekstra' => $ekstra, 'buku' => $buku, 'psb' => $psb, 'tasyakuran' => $tasyakuran, 'sumbangan_buku' => $sumbangan_buku, 'ujian_1' => $ujian_1, 'ujian_2' => $ujian_2, 'un' => $un, 'tunggakan' => $tunggakan, 'uang_spp' => $uang_spp, 'uang_ekstra' => $uang_ekstra, 'uang_buku' => $uang_buku, 'uang_psb' => $uang_psb, 'uang_tasyakuran' => $uang_tasyakuran, 'uang_sumbangan_buku' => $uang_sumbangan_buku, 'uang_ujian' => $uang_ujian, 'uang_un' => $uang_un, 'uang_tunggakan' => $uang_tunggakan])->setPaper('legal', 'landscape');
        return $pdf->stream('laporan-uangmasuk-bulan-pdf');
    }

    public function cetak_hari_pdf(Request $request)
    {
        $hari = $request->hari;
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $uangkeluar = uangkeluar::whereDay('tgl_keluar', $hari)->whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("jumlah");

        $spp = uangmasuk::whereDay('tgl_masuk', $hari)->whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("spp");
        $ekstra = uangmasuk::whereDay('tgl_masuk', $hari)->whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("ekstra");
        $buku = uangmasuk::whereDay('tgl_masuk', $hari)->whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("buku");
        $psb = uangmasuk::whereDay('tgl_masuk', $hari)->whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("psb");
        $tasyakuran = uangmasuk::whereDay('tgl_masuk', $hari)->whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("tasyakuran");
        $sumbangan_buku = uangmasuk::whereDay('tgl_masuk', $hari)->whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("sumbangan_buku");
        $ujian_1 = uangmasuk::whereDay('tgl_masuk', $hari)->whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("ujian_1");
        $ujian_2 = uangmasuk::whereDay('tgl_masuk', $hari)->whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("ujian_2");
        $un = uangmasuk::whereDay('tgl_masuk', $hari)->whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("un");
        $tunggakan = uangmasuk::whereDay('tgl_masuk', $hari)->whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("tunggakan");

        $uang_spp = uangkeluar::whereDay('tgl_keluar', $hari)->whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("spp");
        $uang_ekstra = uangkeluar::whereDay('tgl_keluar', $hari)->whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("ekstra");
        $uang_buku = uangkeluar::whereDay('tgl_keluar', $hari)->whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("buku");
        $uang_psb = uangkeluar::whereDay('tgl_keluar', $hari)->whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("psb");
        $uang_tasyakuran = uangkeluar::whereDay('tgl_keluar', $hari)->whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("tasyakuran");
        $uang_sumbangan_buku = uangkeluar::whereDay('tgl_keluar', $hari)->whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("sumbangan_buku");
        $uang_ujian = uangkeluar::whereDay('tgl_keluar', $hari)->whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("ujian");
        $uang_un = uangkeluar::whereDay('tgl_keluar', $hari)->whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("un");
        $uang_tunggakan = uangkeluar::whereDay('tgl_keluar', $hari)->whereMonth('tgl_keluar', $bulan)->whereYear('tgl_keluar', $tahun)->sum("tunggakan");

        $jmlh = uangmasuk::whereDay('tgl_masuk', $hari)->whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->sum("total");
        $uangmasuk = uangmasuk::whereDay('tgl_masuk', $hari)->whereMonth('tgl_masuk', $bulan)->whereYear('tgl_masuk', $tahun)->get();
        $tampil_masuk = uangmasuk::sum("total");
        $tampil_keluar = uangkeluar::sum("jumlah");
        // dd($uangmasuk);
        $pdf = PDF::loadview('uangmasuk_hari_pdf', ['uangmasuk' => $uangmasuk, 'jmlh' => $jmlh, 'uangkeluar' => $uangkeluar, 'tampil_masuk' => $tampil_masuk, 'tampil_keluar' => $tampil_keluar, 'spp' => $spp, 'ekstra' => $ekstra, 'buku' => $buku, 'psb' => $psb, 'tasyakuran' => $tasyakuran, 'sumbangan_buku' => $sumbangan_buku, 'ujian_1' => $ujian_1, 'ujian_2' => $ujian_2, 'un' => $un, 'tunggakan' => $tunggakan, 'uang_spp' => $uang_spp, 'uang_ekstra' => $uang_ekstra, 'uang_buku' => $uang_buku, 'uang_psb' => $uang_psb, 'uang_tasyakuran' => $uang_tasyakuran, 'uang_sumbangan_buku' => $uang_sumbangan_buku, 'uang_ujian' => $uang_ujian, 'uang_un' => $uang_un, 'uang_tunggakan' => $uang_tunggakan])->setPaper('legal', 'landscape');
        return $pdf->stream('laporan-uangmasuk-hari-pdf');
    }
}

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


class uangmasukController extends Controller
{
    public function Index()
    {
        $tampil = uangmasuk::all()->sortByDesc('tgl_masuk');
        return view('uangmasuk', ['tampil' => $tampil]);
    }


    public function tambah(Request $request)
    {
        // $this->validate($request, [
        //     'aturan_riau' => 'required'
        // ]);
        uangmasuk::create(
            [
                'nis' => $request->nis,
                'nama_santri' => $request->nama_santri,
                'tgl_masuk' => $request->tgl_masuk,
                'kelas' => $request->kelas,
                'no_hp' => $request->no_hp,
                'spp' => $request->spp * $request->j_bulan,
                'j_bulan' => $request->j_bulan,
                'ekstra' => $request->ekstra,
                'buku' => $request->buku,
                'psb' => $request->psb,
                'tasyakuran' => $request->tasyakuran,
                'sumbangan_buku' => $request->sumbangan_buku,
                'ujian_1' => $request->ujian_1,
                'ujian_2' => $request->ujian_2,
                'un' => $request->un,
                'tunggakan' => $request->tunggakan,
                'total' => $request->spp * $request->j_bulan + $request->ekstra + $request->buku + $request->psb + $request->tasyakuran + $request->sumbangan_buku + $request->ujian_1 + $request->ujian_2 + $request->un + $request->tunggakan

            ]
        );
        Session()->flash('sukses', 'Data Berhasil disimpan');
        return redirect('/uangmasuk');
    }

    public function Hapus($id_masuk)
    {
        $hapus = uangmasuk::find($id_masuk);
        $hapus->delete();

        return redirect('/uangmasuk');
    }

    public function Update(Request $request)
    {
        $update = uangmasuk::find($request->id_masuk);
        $update->nis = $request->nis;
        $update->nama_santri = $request->nama_santri;
        $update->tgl_masuk = $request->tgl_masuk;
        $update->kelas = $request->kelas;
        $update->no_hp = $request->no_hp;
        $update->spp = $request->spp * $request->j_bulan;
        $update->j_bulan = $request->j_bulan;
        $update->ekstra = $request->ekstra;
        $update->buku = $request->buku;
        $update->psb = $request->psb;
        $update->tasyakuran = $request->tasyakuran;
        $update->sumbangan_buku = $request->sumbangan_buku;
        $update->ujian_1 = $request->ujian_1;
        $update->ujian_2 = $request->ujian_2;
        $update->un = $request->un;
        $update->tunggakan = $request->tunggakan;
        $update->total = $request->spp * $request->j_bulan + $request->ekstra + $request->buku + $request->psb + $request->tasyakuran + $request->sumbangan_buku + $request->ujian_1 + $request->ujian_2 + $request->un + $request->tunggakan;
        $update->save();


        Session()->flash('sukses', 'Data Berhasil diupdate');
        return redirect('/uangmasuk');
    }

    public function print($id_masuk)
    {
        $uangmasuk = uangmasuk::where("id_masuk", $id_masuk)->get();
        // dd($id_masuk);
        $pdf = PDF::loadview('print_uangmasuk_pdf', ['uangmasuk' => $uangmasuk])->setPaper('A4', 'landscape');
        return $pdf->stream('print-uangmasuk-pdf');
    }
}

<?php

namespace App\Http\Controllers;

use App\uangkeluar;
use Ramsey\Uuid\Uuid;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class UangkeluarController extends Controller
{
    public function Index()
    {
        $tampil = uangkeluar::all()->sortByDesc('tgl_keluar');
        return view('uangkeluar', ['tampil' => $tampil]);
    }


    public function tambah(Request $request)
    {
        // $this->validate($request, [
        //     'aturan_riau' => 'required'
        // ]);
        uangkeluar::create(
            [
                'pj' => $request->pj,
                'tgl_keluar' => $request->tgl_keluar,
                'jenis' => $request->jenis,
                'spp' => $request->spp,
                'ekstra' => $request->ekstra,
                'buku' => $request->buku,
                'psb' => $request->psb,
                'tasyakuran' => $request->tasyakuran,
                'sumbangan_buku' => $request->sumbangan_buku,
                'ujian' => $request->ujian,
                'un' => $request->un,
                'tunggakan' => $request->tunggakan,
                'jumlah' => $request->spp + $request->ekstra + $request->buku + $request->psb + $request->tasyakuran + $request->sumbangan_buku + $request->ujian + $request->un + $request->tunggakan,
                'ket' => $request->ket

            ]
        );


        Session()->flash('sukses', 'Data Berhasil disimpan');
        return redirect('/uangkeluar');
    }

    public function Hapus($id_keluar)
    {
        $hapus = uangkeluar::find($id_keluar);
        $hapus->delete();

        return redirect('/uangkeluar');
    }

    public function Update(Request $request)
    {
        $update = uangkeluar::find($request->id_keluar);
        $update->pj = $request->pj;
        $update->tgl_keluar = $request->tgl_keluar;
        $update->jenis = $request->jenis;
        $update->spp = $request->spp;
        $update->ekstra = $request->ekstra;
        $update->buku = $request->buku;
        $update->psb = $request->psb;
        $update->tasyakuran = $request->tasyakuran;
        $update->sumbangan_buku = $request->sumbangan_buku;
        $update->ujian = $request->ujian;
        $update->un = $request->un;
        $update->tunggakan = $request->tunggakan;
        $update->jumlah = $request->spp + $request->ekstra + $request->buku + $request->psb + $request->tasyakuran + $request->sumbangan_buku + $request->ujian + $request->un + $request->tunggakan;
        $update->ket = $request->ket;
        $update->save();


        Session()->flash('sukses', 'Data Berhasil diupdate');
        return redirect('/uangkeluar');
    }

    public function print($id_keluar)
    {
        $uangkeluar = uangkeluar::where("id_keluar", $id_keluar)->get();
        // dd($id_masuk);
        $pdf = PDF::loadview('print_uangkeluar_pdf', ['uangkeluar' => $uangkeluar])->setPaper('A4', 'landscape');
        return $pdf->stream('print-uangkeluar-pdf');
    }
}

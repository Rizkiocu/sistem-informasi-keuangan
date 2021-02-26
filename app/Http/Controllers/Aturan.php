<?php

namespace App\Http\Controllers;


use App\uangkeluar;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class aturan extends Controller
{
    public function Index()
    {
        //$tampil = DB::table('aturan_morf')->get();
        //return view('Aturan', ['tampil' => $tampil]);
        $nama = Auth::guard('admin')->user()->nama;
        // dd(Auth::user());
        return view('dashboard', ['nama' => $nama]);
    }
}

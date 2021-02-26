<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\userModel;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function index()
    {

        $tampil = userModel::all();
        return view('user', ['tampil' => $tampil]);
    }
    public function tambah(Request $request)
    {
        userModel::create(
            [
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]
        );
        return redirect('user');
    }
    public function edit(Request $request)
    {
        userModel::where('id', $request->id)->update(
            [
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]
        );
        return redirect('user');
    }
    public function hapus($id)
    {
        userModel::where('id', $id)->delete();

        return redirect('user');
    }
}

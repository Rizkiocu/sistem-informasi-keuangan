<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $auth = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($auth)) {
            // dd(Auth::guard('admin')->user());
            $request->session()->flash('sukses', 'Login Gagal');
            return redirect('/dashboard');
        }
        $request->session()->flash('gagal', 'Login Gagal');
        return redirect()->back();
    }
    public function logout(Request $request)
    {
        auth()->guard('admin')->logout();
        return redirect('/');
    }
}

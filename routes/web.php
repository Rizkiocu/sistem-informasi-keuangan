<?php

use App\uangmasuk;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'loginController@index');
Route::post('/login/login', 'loginController@login');
//data users

Route::group(['middleware' => 'admin'], function () {
    Route::get('/logout', 'loginController@logout');
    Route::get('/dashboard', 'Aturan@index');

    Route::get('/user', 'userController@index');
    Route::post('/user/tambah', 'userController@tambah');
    Route::post('/user/edit/', 'userController@edit');
    Route::get('/user/Hapus/{id}', 'userController@hapus');

    //data keuangan
    Route::get('/data', 'dataController@index');

    // proses spp masuk
    Route::get('/uangmasuk', 'uangmasukController@index');

    Route::post('/uangmasuk/tambah', 'uangmasukController@tambah');

    Route::get('/uangmasuk/Hapus/{id_masuk}', 'uangmasukController@hapus');

    Route::post('/uangmasuk/update/', 'uangmasukController@update');
    Route::get('/uangmasuk/cetak_pdf', 'uangmasukController@cetak_pdf');

    Route::get('/uangmasuk/print/{id_masuk}', 'uangmasukController@print');



    // Proses Uang Keluar
    Route::get('/uangkeluar', 'UangkeluarController@index');

    Route::post('/uangkeluar/tambah', 'UangkeluarController@tambah');

    Route::get('/uangkeluar/Hapus/{id_keluar}', 'UangkeluarController@hapus');

    Route::post('/uangkeluar/update/', 'UangkeluarController@update');

    Route::get('/uangkeluar/print/{id_keluar}', 'uangkeluarController@print');

    //proses laporan

    Route::get('/laporan', 'laporanController@index');
    Route::get('/laporan/cetak_pdf', 'laporanController@cetak_pdf');
    Route::get('/laporan/cetak_bulan_pdf', 'laporanController@cetak_bulan_pdf');
    Route::get('/laporan/cetak_hari_pdf', 'laporanController@cetak_hari_pdf');

    Route::get('/l_uangkeluar', 'l_uangkeluarController@index');
    Route::get('/l_uangkeluar/cetak_uangkeluar_hari', 'l_uangkeluarController@cetak_uangkeluar_hari');
    Route::get('/l_uangkeluar/cetak_uangkeluar_tahun', 'l_uangkeluarController@cetak_uangkeluar_tahun');
    Route::get('/l_uangkeluar/cetak_uangkeluar_bulan', 'l_uangkeluarController@cetak_uangkeluar_bulan');
});

@extends('template')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- /.box -->

            <div class="box">
                <div class="box-header  with-border">
                    <h3 class="box-title">Data Uang Masuk</h3>
                    <div class="box-tools pull-right">
                        @if (Session()->has('sukses'))
                        <div class="alert alert-success alert-block">
                            {{ Session('sukses')}}
                        </div>
                        @endif

                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"> <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"><i class="fa fa-times"></i></button>
                    </div>

                </div>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah" style="margin: 15px"> <i class="fa fa-plus"></i> Tambah </button>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>SPP</th>
                                <th>Ekstra</th>
                                <th>Buku</th>
                                <th>Psb</th>
                                <th>Tasyakuran</th>
                                <th>S Buku</th>
                                <th>Ujian</th>
                                <th>UN</th>
                                <th>Tunggakan</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>



                        <tbody>
                            @foreach($tampil as $p)
                            <tr>
                                <td>{{$p->nis}}</td>
                                <td>{{ $p->nama_santri}}</td>
                                <td>{{ $p->spp}}</td>
                                <td>{{ $p->ekstra}}</td>
                                <td>{{ $p->buku}}</td>
                                <td>{{ $p->psb}}</td>
                                <td>{{ $p->tasyakuran}}</td>
                                <td>{{ $p->sumbangan_buku}}</td>
                                <td>{{ $p->ujian_1 + $p->ujian_2}}</td>
                                <td>{{$p->un}}</td>
                                <td>{{$p->tunggakan}}</td>
                                <td>{{ $p->total}}</td>
                                <td>
                                    <a href="/uangmasuk/print/{{$p->id_masuk}}; ?>" target="_blank"><span class="glyphicon glyphicon-print" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="print"></span></a> |
                                    <a href="#lihat{{$p->id_masuk}}" data-toggle="modal"><span class="glyphicon glyphicon-eye-open" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="lihat"></span></a> |
                                    <a href="#edit{{$p->id_masuk}}" data-toggle="modal"><span class="glyphicon glyphicon-pencil" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Edit"></span></a> |
                                    <a href="/uangmasuk/Hapus/{{ $p->id_masuk}}" onclick="return confirm('Anda yakin?')"><span class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Hapus"></span></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

<div class="modal fade" id="tambah">
    <div class="modal-dialog" style="width:68%">
        <div class="modal-content">
            <div class="modal-header ">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title "> Tambah Uang Keluar</h4>
            </div>

            <form class="form-horizontal" action="/uangmasuk/tambah" method="POST">
                {{ csrf_field() }}

                <div style="margin-left: 15px;" class="form-group">
                    <label class="col-sm-2 control-label">Tanggal Uang Masuk</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" name="tgl_masuk" required="">
                    </div>
                </div>

                <div style="margin-top: 20px; margin-left: 15px;" class="form-group">
                    <label class="col-sm-2 control-label">NIS</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="NIS" name="nis" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Nama" name="nama_santri" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Kelas</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Kelas" name="kelas" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">NO HP</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" placeholder="No HP" name="no_hp" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">SPP</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="spp" value="650000" onkeyup=jumlah() name="spp" required="" readonly>
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Berapa Bulan</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="j_bulan" value="0" onkeyup=jumlah() name="j_bulan" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Ekstra</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="ekstra" value="0" onkeyup=jumlah() name="ekstra" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Buku</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="buku" value="0" onkeyup=jumlah() name="buku" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">PSB</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="psb" value="0" onkeyup=jumlah() name="psb" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Tasyakuran</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="tasyakuran" value="0" onkeyup=jumlah() name="tasyakuran" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Sumbangan Buku</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="sumbangan_buku" value="0" onkeyup=jumlah() name="sumbangan_buku" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Ujian Smt 1</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="ujian_1" value="0" onkeyup=jumlah() name="ujian_1" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Ujian Smt 2</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="ujian_2" value="0" onkeyup=jumlah() name="ujian_2" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">UN</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="un" value="0" onkeyup=jumlah() name="un" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Tunggakan</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="tunggakan" value="0" onkeyup=jumlah() name="tunggakan" required="">
                    </div>
                </div>
                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Total</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="total" disabled name="total" required="">
                    </div>
                </div>


                <div class="modal-footer">

                    <button type="submit" id="send" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


@foreach ($tampil as $p)
<div class="modal fade" id="edit{{ $p->id_masuk }}" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-ig" style="width:68%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel2">Edit Data</h4>
            </div>

            <form class="form-horizontal" action="/uangmasuk/update" method="POST">
                {{ csrf_field() }}

                <div style="margin-left: 15px;" class="form-group">
                    <label class="col-sm-2 control-label">Tanggal Uang Masuk</label>
                    <div class="col-sm-8">
                        <input type="hidden" class="form-control" name="id_masuk" value="{{$p->id_masuk}}">
                        <input type="date" class="form-control" name="tgl_masuk" value="{{$p->tgl_masuk}}" required="">
                    </div>
                </div>

                <div style="margin-top: 20px; margin-left: 15px;" class="form-group">
                    <label class="col-sm-2 control-label">NIS</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="NIS" name="nis" value="{{$p->nis}}" readonly required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Nama" name="nama_santri" value="{{$p->nama_santri}}" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Kelas</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Kelas" name="kelas" value="{{$p->kelas}}" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">NO HP</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" placeholder="No HP" name="no_hp" value="{{$p->no_hp}}" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">SPP</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="spp" value="650000" onkeyup=jumlah() name="spp" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Bulan</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="j_bulan" value="{{$p->j_bulan}}" onkeyup=jumlah() name="j_bulan" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Ekstra</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="ekstra" value="{{$p->ekstra}}" onkeyup=jumlah() name="ekstra" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Buku</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="buku" value="{{$p->buku}}" onkeyup=jumlah() name="buku" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">PSB</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="psb" value="{{$p->psb}}" onkeyup=jumlah() name="psb" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Tasyakuran</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="tasyakuran" value="{{$p->tasyakuran}}" onkeyup=jumlah() name="tasyakuran" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Sumbangan Buku</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="sumbangan_buku" value="{{$p->sumbangan_buku}}" onkeyup=jumlah() name="sumbangan_buku" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Ujian Smt 1</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="ujian_1" value="{{$p->ujian_1}}" onkeyup=jumlah() name="ujian_1" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Ujian Smt 2</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="ujian_2" value="{{$p->ujian_2}}" onkeyup=jumlah() name="ujian_2" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">UN</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="un" value="{{$p->un}}" onkeyup=jumlah() name="un" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Tunggakan</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="tunggakan" value="{{$p->tunggakan}}" onkeyup=jumlah() name="tunggakan" required="">
                    </div>
                </div>
                <!-- <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Total</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="total" readonly name="total" value="{{$p->total}}" required="">
                    </div>
                </div> -->

                <div class="modal-footer">

                    <button type="submit" id="send" class="btn btn-primary">Simpan</button>
                </div>
            </form>


        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach

@foreach ($tampil as $p)
<div class="modal fade" id="lihat{{ $p->id_masuk }}" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-ig" style="width:68%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel2">Lihat Data</h4>
            </div>

            <form class="form-horizontal" action="/uangmasuk/update" method="POST">
                {{ csrf_field() }}

                <div style="margin-left: 15px;" class="form-group">
                    <label class="col-sm-2 control-label">Tanggal Uang Masuk</label>
                    <div class="col-sm-8">
                        <input type="hidden" class="form-control" name="id_masuk" value="{{$p->id_masuk}}">
                        <input type="date" class="form-control" value="{{$p->tgl_masuk}}" disabled>
                    </div>
                </div>

                <div style="margin-top: 20px; margin-left: 15px;" class="form-group">
                    <label class="col-sm-2 control-label">NIS</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{$p->nis}}" disabled>
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{$p->nama_santri}}" disabled>
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Kelas</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{$p->kelas}}" disabled>
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">NO HP</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" value="{{$p->no_hp}}" disabled>
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">SPP</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" value="{{$p->spp}}" disabled>
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Ekstra</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="ekstra" value="{{$p->ekstra}}" disabled>
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Buku</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="buku" value="{{$p->buku}}" disabled>
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">PSB</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="psb" value="{{$p->psb}}" disabled>
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Tasyakuran</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="tasyakuran" value="{{$p->tasyakuran}}" disabled>
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Sumbangan Buku</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="sumbangan_buku" value="{{$p->sumbangan_buku}}" disabled>
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Ujian Smt 1</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="ujian_1" value="{{$p->ujian_1}}" disabled>
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Ujian Smt 2</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="ujian_2" value="{{$p->ujian_2}}" disabled>
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">UN</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="un" value="{{$p->un}}" disabled>
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Tunggakan</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="tunggakan" value="{{$p->tunggakan}}" disabled>
                    </div>
                </div>
                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Total</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="total" disabled name="total" value="{{$p->total}}">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-remove" data-dismiss="modal">Keluar</button>
                </div>
            </form>


        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endforeach

<script>
    function jumlah() {
        var spp = document.getElementById("spp").value;
        var ekstra = document.getElementById("ekstra").value;
        var buku = document.getElementById("buku").value;
        var psb = document.getElementById("psb").value;
        var j_bulan = document.getElementById("j_bulan").value;
        var tasyakuran = document.getElementById("tasyakuran").value;
        var sumbangan_buku = document.getElementById("sumbangan_buku").value;
        var ujian_1 = document.getElementById("ujian_1").value;
        var ujian_2 = document.getElementById("ujian_2").value;
        var un = document.getElementById("un").value;
        var tunggakan = document.getElementById("tunggakan").value;
        var total = parseInt(spp) * parseInt(j_bulan) + parseInt(ekstra) + parseInt(buku) + parseInt(psb) + parseInt(tasyakuran) + parseInt(sumbangan_buku) + parseInt(ujian_1) + parseInt(ujian_2) + parseInt(un) + parseInt(tunggakan);

        var hasil = document.getElementById("total");
        hasil.value = total;


    }
</script>
@endsection
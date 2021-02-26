@extends('template')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- /.box -->

            <div class="box">
                <div class="box-header  with-border">
                    <h3 class="box-title">Data Uang Keluar</h3>
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
                                <th>Penanggung Jawab</th>
                                <th>Tanggal Pengeluaran</th>
                                <th>Jenis Pengeluaran</th>
                                <th>Jumlah</th>
                                <th>KET</th>
                                <th>Action</th>
                            </tr>
                        </thead>



                        <tbody>
                            @foreach($tampil as $p)
                            <tr>
                                <td>{{ $p->pj}}</td>
                                <td>{{ \Carbon\Carbon :: parse($p->tgl_keluar)->format('d-m-Y')  }}</td>
                                <td>{{ $p->jenis}}</td>
                                <td>{{ $p->jumlah}}</td>
                                <td>{{ $p->ket}}</td>
                                <td>
                                    <a href="/uangkeluar/print/{{$p->id_keluar}}; ?>" target="_blank"><span class="glyphicon glyphicon-print" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="print"></span></a> |

                                    <a href="#edit{{$p->id_keluar}}" data-toggle="modal"><span class="glyphicon glyphicon-pencil" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Edit"></span></a> |
                                    <a href="/uangkeluar/Hapus/{{ $p->id_keluar}}" onclick="return confirm('Anda yakin?')"><span class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Hapus"></span></a>
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

            <form class="form-horizontal" action="/uangkeluar/tambah" method="POST">
                {{ csrf_field() }}

                <div style="margin-top: 20px; margin-left: 15px;" class="form-group">
                    <label class="col-sm-2 control-label">Penanggung Jawab</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Penanggung Jawab" name="pj" required="">
                    </div>
                </div>

                <div style="margin-left: 15px;" class="form-group">
                    <label class="col-sm-2 control-label">Tanggal Keluar</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" placeholder="INDO" name="tgl_keluar" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Jenis Pengeluaran</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Jenis Pengeluaran" name="jenis" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Uang Keluar SPP</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="spp" value="0" onkeyup=total() name="spp" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Uang Keluar Ekstra</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="ekstra" value="0" onkeyup=total() name="ekstra" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Uang Keluar Buku</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="buku" value="0" onkeyup=total() name="buku" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Uang Keluar PSB</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="psb" value="0" onkeyup=total() name="psb" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Uang Keluar Tasyakuran</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="tasyakuran" value="0" onkeyup=total() name="tasyakuran" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Uang Keluar Sumbangan Buku</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="sumbangan_buku" value="0" onkeyup=total() name="sumbangan_buku" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Uang Keluar Ujian</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="ujian" value="0" onkeyup=total() name="ujian" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Uang Keluar UN</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="un" value="0" onkeyup=total() name="un" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Uang Keluar Tunggakan</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="tunggakan" value="0" onkeyup=total() name="tunggakan" required="">
                    </div>
                </div>
                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Jumlah Pengeluaran</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="jumlah" disabled name="jumlah" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Keterangan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Keterangan" name="ket" required="">
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
<div class="modal fade" id="edit{{ $p->id_keluar }}" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-ig" style="width:68%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel2">Edit Data</h4>
            </div>

            <form class="form-horizontal" action="/uangkeluar/update" method="POST">
                {{ csrf_field() }}

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Penanggung Jawab</label>
                    <div class="col-sm-8">
                        <input type="hidden" class="form-control" name="id_keluar" value="{{$p->id_keluar}}">
                        <input type="text" class="form-control" placeholder="RIAU" name="pj" value="{{$p->pj}}" required="">

                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Tanggal Pengeluaran</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" placeholder="INDO" name="tgl_keluar" value="{{$p->tgl_keluar}}" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Jenis Pengeluaran</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="INDO" name="jenis" value="{{$p->jenis}}" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Uang Keluar SPP</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="spp" value="{{$p->spp}}" onkeyup=ubah() name="spp" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Uang Keluar Ekstra</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="ekstra" value="{{$p->ekstra}}" onkeyup=ubah() name="ekstra" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Uang Keluar Buku</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="buku" value="{{$p->buku}}" onkeyup=ubah() name="buku" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Uang Keluar PSB</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="psb" value="{{$p->psb}}" onkeyup=ubah() name="psb" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Uang Keluar Tasyakuran</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="tasyakuran" value="{{$p->tasyakuran}}" onkeyup=ubah() name="tasyakuran" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Uang Keluar Sumbangan Buku</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="sumbangan_buku" value="{{$p->sumbangan_buku}}" onkeyup=ubah() name="sumbangan_buku" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Uang Keluar Ujian</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="ujian" value="{{$p->ujian}}" onkeyup=ubah() name="ujian" required="">
                    </div>
                </div>


                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Uang Keluar UN</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="un" value="{{$p->un}}" onkeyup=ubah() name="un" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Uang Keluar Tunggakan</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="tunggakan" value="{{$p->tunggakan}}" onkeyup=ubah() name="tunggakan" required="">
                    </div>
                </div>

                <!-- <div class="form-group">
                    <label class="col-sm-2 control-label">Jumlah Pengeluaran</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{$p->jumlah}}" required="">
                    </div>
                </div> -->

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Keterangan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="RIAU" name="ket" value="{{$p->ket}}" required="">
                    </div>
                </div>


                <div class="modal-footer">

                    <button type="submit" id="send" class="btn btn-primary">Update</button>
                </div>
            </form>


        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endforeach

<script>
    function total() {
        var spp = document.getElementById("spp").value;
        var ekstra = document.getElementById("ekstra").value;
        var buku = document.getElementById("buku").value;
        var psb = document.getElementById("psb").value;
        var tasyakuran = document.getElementById("tasyakuran").value;
        var sumbangan_buku = document.getElementById("sumbangan_buku").value;
        var ujian = document.getElementById("ujian").value;
        var un = document.getElementById("un").value;
        var tunggakan = document.getElementById("tunggakan").value;
        var jumlah = parseInt(spp) + parseInt(ekstra) + parseInt(buku) + parseInt(psb) + parseInt(tasyakuran) + parseInt(sumbangan_buku) + parseInt(ujian) + parseInt(un) + parseInt(tunggakan);

        var hasil = document.getElementById("jumlah");
        hasil.value = jumlah;

    }

    function ubah() {
        var spp = document.getElementById("spp").value;
        var ekstra = document.getElementById("ekstra").value;
        var buku = document.getElementById("buku").value;
        var psb = document.getElementById("psb").value;
        var tasyakuran = document.getElementById("tasyakuran").value;
        var sumbangan_buku = document.getElementById("sumbangan_buku").value;
        var ujian = document.getElementById("ujian").value;
        var un = document.getElementById("un").value;
        var tunggakan = document.getElementById("tunggakan").value;
        var jumlah = parseInt(spp) + parseInt(ekstra) + parseInt(buku) + parseInt(psb) + parseInt(tasyakuran) + parseInt(sumbangan_buku) + parseInt(ujian) + parseInt(un) + parseInt(tunggakan);

        var hasil = document.getElementById("jumlah");
        hasil.value = jumlah;

    }
</script>
@endsection
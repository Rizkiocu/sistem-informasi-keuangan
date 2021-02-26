@extends('template')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- /.box -->

            <div class="box">
                <div class="box-header  with-border">
                    <h3 class="box-title">Data User</h3>
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>



                        <tbody>
                            @foreach($tampil as $p)
                            <tr>
                                <td>{{ $p->nama}}</td>
                                <td>{{ $p->email}}</td>
                                <td>
                                    <a href="#edit{{$p->id}}" data-toggle="modal"><span class="glyphicon glyphicon-pencil" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Edit"></span></a> |
                                    <a href="/user/Hapus/{{ $p->id}}" onclick="return confirm('Anda yakin?')"><span class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Hapus"></span></a>
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

            <form class="form-horizontal" action="/user/tambah" method="POST">
                {{ csrf_field() }}


                <div style="margin-top: 20px; margin-left: 15px;" class="form-group">
                    <label class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="Nama" name="nama" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" placeholder="Email" name="email" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" placeholder="Password" name="password" required="">
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
<div class="modal fade" id="edit{{ $p->id }}" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-ig" style="width:68%">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel2">Edit Data User</h4>
            </div>

            <form class="form-horizontal" action="/user/edit" method="POST">
                {{ csrf_field() }}

                <div style="margin-top: 20px; margin-left: 15px;" class="form-group">
                    <label class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="hidden" class="form-control" name="id" value="{{$p->id}}">
                        <input type="text" class="form-control" placeholder="Nama" name="nama" value="{{$p->nama}}" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="{{$p->email}}" required="">
                    </div>
                </div>

                <div class="form-group" style="margin-left: 15px;">
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" placeholder="Password" name="password" required="">
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
@endforeach
@endsection
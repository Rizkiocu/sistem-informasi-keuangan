@extends('template')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <!-- /.box -->

            <div class="box">
                <div class="box-header  with-border">
                    <h3 class="box-title">Data Keuangan</h3>
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


                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">

                                    <p><b> Data Uang Masuk : <?php
                                                                $tanggal = mktime(date("m"), date("d"), date("Y"));
                                                                echo date("M-Y", $tanggal);
                                                                ?></b></p>
                                    <h3>Rp. {{$masuk}}</h3>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-4 col-6" style="margin-left: 150px;">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">

                                    <p><b> Total Uang Masuk : <?php
                                                                $tanggal = mktime(date("m"), date("d"), date("Y"));
                                                                echo date("d-M-Y", $tanggal);
                                                                ?></b></p>
                                    <h3>Rp. {{$tampil_masuk}}</h3>

                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">

                                    <p><b> Data Uang keluar : <?php
                                                                $tanggal = mktime(date("m"), date("d"), date("Y"));
                                                                echo date("M-Y", $tanggal);
                                                                ?></b></p>
                                    <h3>Rp. {{$keluar}}</h3>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-4 col-6" style="margin-left: 150px;">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">

                                    <p><b> Total Uang Keluar : <?php
                                                                $tanggal = mktime(date("m"), date("d"), date("Y"));
                                                                echo date("d-M-Y", $tanggal);
                                                                ?></b></p>
                                    <h3>Rp. {{$tampil_keluar}}</h3>

                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">

                                    <p><b> Sisa Pengeluaran Bulan : <?php
                                                                    $tanggal = mktime(date("m"), date("d"), date("Y"));
                                                                    echo date("M-Y", $tanggal);
                                                                    ?></b></p>
                                    <h3>Rp. {{$masuk-$keluar}}</h3>

                                </div>

                            </div>

                        </div>

                        <div class="col-lg-4 col-6" style="margin-left: 150px;">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">

                                    <p><b> Kas Keuangan : <?php
                                                            $tanggal = mktime(date("m"), date("d"), date("Y"));
                                                            echo date("d-M-Y", $tanggal);
                                                            ?></b></p>
                                    <h3>Rp. {{$tampil_masuk-$tampil_keluar}}</h3>

                                </div>

                            </div>

                        </div>
                    </div>




                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

@endsection
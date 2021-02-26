@extends('template')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">



            <!-- Custom Tabs -->

            <div class="box box-primary">
                <div class="box-header with-border">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_3" data-toggle="tab">Laporan Uang Keluar Perhari</a></li>
                        <li><a href="#tab_1" data-toggle="tab">Laporan Uang Keluar Perbulan</a></li>
                        <li><a href="#tab_2" data-toggle="tab">Laporan Uang Keluar Pertahun</a></li>


                    </ul>
                    <div class="box-tools pull-right">

                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"> <i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>


                </div>


                <div class="box-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_3">


                            <form class="form-horizontal" target="_blank" method="GET" action="/l_uangkeluar/cetak_uangkeluar_hari">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label col-sm-12">Tanggal</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control select2" name="hari" required="">

                                                    <option value="">-- Choose Option --</option>
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                    <option value="4">04 </option>
                                                    <option value="5">05</option>
                                                    <option value="6">06</option>
                                                    <option value="7">07</option>
                                                    <option value="8">08</option>
                                                    <option value="9">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                    <option value="13">13</option>
                                                    <option value="14">14</option>
                                                    <option value="15">15</option>
                                                    <option value="16">16</option>
                                                    <option value="17">17</option>
                                                    <option value="18">18</option>
                                                    <option value="19">19</option>
                                                    <option value="20">20</option>
                                                    <option value="21">21</option>
                                                    <option value="22">22</option>
                                                    <option value="23">23</option>
                                                    <option value="24">24</option>
                                                    <option value="25">25</option>
                                                    <option value="26">26</option>
                                                    <option value="27">27</option>
                                                    <option value="28">28</option>
                                                    <option value="29">29</option>
                                                    <option value="30">30</option>
                                                    <option value="31">31</option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label col-sm-12">Bulan</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control select2" name="bulan" required="">

                                                    <option value="">-- Choose Option --</option>
                                                    <option value="1">Januari</option>
                                                    <option value="2">Februari</option>
                                                    <option value="3">Maret</option>
                                                    <option value="4">April </option>
                                                    <option value="5">Mei</option>
                                                    <option value="6">Juni</option>
                                                    <option value="7">Juli</option>
                                                    <option value="8">Agustus</option>
                                                    <option value="9">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label col-sm-12">Tahun</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control select2" name="tahun" required="">

                                                    <option value="">-- Choose Option --</option>
                                                    <?php
                                                    $mulai = date('Y') - 5;
                                                    for ($i = $mulai; $i < $mulai + 15; $i++) {
                                                        $sel = $i == date('Y') ? ' selected="selected"' : '';
                                                        echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div><br>
                                <div class="row">
                                    <div class="col-md-5 ">
                                    </div>
                                    <div class="col-md-1 ">
                                        <button id="send" type="submit" class="btn btn-primary">Cetak</button>

                                    </div>

                                </div><br>

                            </form>
                        </div>

                        <div class="tab-pane" id="tab_1">


                            <form class="form-horizontal" target="_blank" method="GET" action="/l_uangkeluar/cetak_uangkeluar_bulan">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label col-sm-12">Bulan</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control select2" name="bulan" required="">

                                                    <option value="">-- Choose Option --</option>
                                                    <option value="1">Januari</option>
                                                    <option value="2">Februari</option>
                                                    <option value="3">Maret</option>
                                                    <option value="4">April </option>
                                                    <option value="5">Mei</option>
                                                    <option value="6">Juni</option>
                                                    <option value="7">Juli</option>
                                                    <option value="8">Agustus</option>
                                                    <option value="9">September</option>
                                                    <option value="10">Oktober</option>
                                                    <option value="11">November</option>
                                                    <option value="12">Desember</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label col-sm-12">Tahun</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control select2" name="tahun" required="">

                                                    <option value="">-- Choose Option --</option>
                                                    <?php
                                                    $mulai = date('Y') - 5;
                                                    for ($i = $mulai; $i < $mulai + 15; $i++) {
                                                        $sel = $i == date('Y') ? ' selected="selected"' : '';
                                                        echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div><br>
                                <div class="row">
                                    <div class="col-md-5 ">
                                    </div>
                                    <div class="col-md-1 ">
                                        <button id="send" type="submit" class="btn btn-primary">Cetak</button>

                                    </div>

                                </div><br>

                            </form>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">


                            <form class="form-horizontal" target="_blank" method="GET" action="/l_uangkeluar/cetak_uangkeluar_tahun">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="control-label col-sm-12">Tahun</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select class="form-control select2" name="tahun" required="">

                                                    <option value="">-- Choose Option --</option>
                                                    <?php
                                                    $mulai = date('Y') - 5;
                                                    for ($i = $mulai; $i < $mulai + 15; $i++) {
                                                        $sel = $i == date('Y') ? ' selected="selected"' : '';
                                                        echo '<option value="' . $i . '"' . $sel . '>' . $i . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div><br>
                                <div class="row">
                                    <div class="col-md-3 ">
                                    </div>
                                    <div class="col-md-1 ">
                                        <button id="send" type="submit" class="btn btn-primary">Cetak</button>

                                    </div>

                                </div><br>

                            </form>
                        </div>
                        <!-- /.tab-pane -->

                        <!-- /.tab-pane -->
                    </div>
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->

            <!-- /.box-header -->
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->

    <!-- /.row -->
</section>
@endsection
@foreach($uangmasuk as $p)
<table width="800" border="0" cellpadding="4" cellspacing="0" style="border: 1px solid #000;">

    <tr>
        <td rowspan="6" width="70" style="border-right:1px solid #000;"> </td>
        <td width="120" valign=""><b> No</b> </td>
        <td valign="top"> : <b> {{$p->id_masuk}} </b></td>
    </tr>
    <tr>
        <td valign="top"><b> Telah Diterima Dari </b> </td>
        <td valign="top"> : <b> {{$p->nama_santri}} </b></td>
    </tr>
    <tr>
        <td valign="top"><b> Uang Sejumlah </b></td>
        <td valign="top"> :</td>
    </tr>
    <tr>
        <td valign="top"><b>Untuk Pembayaran</b> </td>
        <td valign="top"> : </td>
    </tr>
    <tr>
        <td></td>
        <td valign="top" align="right"><b>Naga Beralih, {{ \Carbon\Carbon :: parse($p->tgl_masuk)->format('d-m-Y')  }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>

    </tr>
    <tr>
        <td valign="bottom">
            <h3>Total Pembayaran Rp {{$p->total}} </h3>
        </td>
        <td valign="top" align="right" height="100" "><b> Kepala Sekolah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b> </td>
      
    </tr>
</table>
@endforeach
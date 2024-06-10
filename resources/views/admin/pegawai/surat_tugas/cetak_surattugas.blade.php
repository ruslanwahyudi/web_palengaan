<table width="95%" border="0" cellspacing="0" cellpadding="5" align="center">
    <tr>
        <td colspan="3">
            <img width="100%" src="https://palengaan.pamekasankab.go.id/kop_kec.png">
            <!-- <img width="80" src="{{ asset('') }}/uploads/faveicon_202405080619PEMKAB TRANSPARANT.png"> -->
        </td>
        
    </tr>
    <tr>
        <td colspan="3" align="center"><b style="text-decoration: underline;">SURAT KETERANGAN DINAS LUAR</b></td>
    </tr>
    <tr>
        <td colspan="3">Yang bertanda tangan dibawah ini :</td>
    </tr>
    <tr>
        <td width="100">Nama</td>
        <td width="10">:</td>
        <td> Muzanni, S.H, M.Si</td>
    </tr>
    <tr>
        <td width="100">NIP</td>
        <td width="10">:</td>
        <td> 19700615 199403 1 008</td>
    </tr>
    <tr>
        <td width="100">Pangkat</td>
        <td width="10">:</td>
        <td> Pembina, IV/a</td>
    </tr>
    <tr>
        <td width="100">Jabatan</td>
        <td width="10">:</td>
        <td> Camat Palengaan</td>
    </tr>
    <tr>
        <td colspan="3">Menerangkan dengan sebenar-benarnya bahwa pegawai di bawah ini ;</td>
    </tr>
    <tr>
        <td width="100">Nama</td>
        <td width="10">:</td>
        <td> ..............................</td>
    </tr>
    <tr>
        <td width="100">NIP</td>
        <td width="10">:</td>
        <td> ..............................</td>
    </tr>
    <tr>
        <td width="100">Pangkat</td>
        <td width="10">:</td>
        <td> ..............................</td>
    </tr>
    <tr>
        <td width="100">Jabatan</td>
        <td width="10">:</td>
        <td> ..............................</td>
    </tr>
    <tr>
        <td colspan="3">
        Pada tanggal {{$model->tanggal}} Tidak melakukan absensi E-Pakon di Kantor Kecamatan Palengaan dikarenakan melaksanakan tugas ({{$model->keterangan}})  – Bukti Terlampir.</td>
    </tr>
    <tr>
        <td colspan="3">
        Demikian surat ini kami buat dengan sebenarnya dan dapat dipergunakan sebagaimana mestinya.
        </td>
    </tr>
    <tr><td colspan="3"></td></tr>
    <tr style="line-height:10px;">
        <td colspan="2"></td>
        <td align="right">Dikeluarkan di : Pamekasan</td>
    </tr>
    <tr style="line-height:10px;">
        <td colspan="2"></td>
        <td align="right">Pada Tanggal : {{$model->tanggal}}</td>
    </tr>
    <tr>
        <td colspan="2"></td>
        <td align="right">
            <img width="250" src="https://palengaan.pamekasankab.go.id/ttd_camat.png">
        </td>
    </tr>
</table>
<!-- {{public_path()}} -->
<!-- <img src="http://127.0.0.1:8000/uploads/admin_images/surat_tugas/2024.jpeg" alt="" srcset=""> -->
<div style="page-break-before: always;">

</div>
<table border="0" width="95%">
    <tr><td align="center">Bukti Pelaksanaan Tugas</td></tr>
    <tr>
        <td align="center">
        <img align="center" width="80%" src="{{ public_path() .'/uploads/admin_images/surat_tugas/'. $model->file_bukti }}">
        </td>
    </tr>
</table>

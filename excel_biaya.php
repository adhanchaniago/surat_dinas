<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=biaya.xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");

  session_start();
  error_reporting(0);
  include "../koneksi.php";
?>
<head>
<title>Print - Print Data Surat Tugas</title>
<style>
.input1 {
	height: 20px;
	font-size: 12px;
	padding-left: 5px;
	margin: 5px 0px 0px 5px;
	width: 97%;
	border: none;
	color: red;
}
#kiri{
width:50%;
float:left;
}

#kanan{
width:50%;
float:right;
padding-top:20px;
margin-bottom:9px;
}

td { border:1px solid #000; }
th { border:2px solid #000; }
</style>
</head>
<body onload="window.print()">
<?php
error_reporting(0);
session_start();
include "koneksi.php"; 
$d = mysql_fetch_array(mysql_query("SELECT * FROM phpmu_kegiatan where id_kegiatan='$_GET[id]'"));
?>
<table border="0">
  <tr><td width="160px">Tahun Anggaran</td>   <td colspan='5'>: <?php echo "$d[tahun_anggaran]"; ?></td></tr>
  <tr><td>Nomor Bukti</td>                    <td colspan='5'>: <?php echo "$d[no_bukti]"; ?></td></tr>   
  <tr><td>Mata Anggaran</td>                  <td colspan='5'>: <?php echo "$d[mata_anggaran]"; ?></td></tr> 
</table>

<h2 align=center>Riancian Biaya Perjalanan Dinas</h2>

<table border="0">
  <tr><td width="160px">Lampiran SPD Nomor</td>   <td colspan='5'>: <?php echo "$d[no_kegiatan]"; ?></td></tr>
  <tr><td>Tanggal</td>                            <td colspan='5'>: <?php echo tgl_indo($d[tgl_mulai]); ?></td></tr>   
</table>

                        <table width='100%' border=1>
                                <tr bgcolor='green' class="alert alert-success">
                                    <th style='color:#fff' width='50px' scope="row">No</th>
                                    <th style='color:#fff'>Rincian Biaya</th>
                                    <th style='color:#fff'>Jumlah</th>
                                    <th colspan='3' style='color:#fff'>Keterangan</th>
                                </tr>
                            <?php 
                                $biaya = mysql_query("SELECT * FROM phpmu_biaya where id_kegiatan='$_GET[id]' ORDER BY id_biaya");
                                $no = 1;
                                while ($b = mysql_fetch_array($biaya)){
                                    echo "<tr>
                                            <td>$no</td>
                                            <td>$b[rincian_biaya]</td>
                                            <td>".rupiah($b[jumlah])."</td>
                                            <td colspan='3'>$b[keterangan]</td>
                                          </tr>";
                                      $no++;
                                }
                                $j = mysql_fetch_array(mysql_query("SELECT sum(jumlah) as total FROM phpmu_biaya where id_kegiatan='$_GET[id]'"));
                                    echo "<tr bgcolor=lightblue>
                                            <td></td>
                                            <td><b>JUMLAH</b></td>
                                            <td><b>".rupiah($j[total])."</b></td>
                                            <td colspan='3'></td>
                                          </tr>";
                            ?>
                        </table>
<br><br>
<table width=100%>
  <tr>
    <td colspan='2' width="38%">Telah Dibayar Sejumlah :<br>
    <?php echo rupiah($j[total]); ?> <br>
    Bendahara Pengeluaran <br>
    Sekretariat PT. Maju Lancar
    </td>

    <td colspan='2' width="30%">
        Lunas Dibayar<br>
        bagian Keuangan
    </td>

    <td colspan='2' >
        Jakarta, <?php tgl_indo(date("Y-m-d")); ?><br>
        Telah Menerima Uang Sebesar : <br>
        <?php echo rupiah($j[total]); ?> <br>
        Yang Menerima <br>
    </td>

  </tr>
</table> 
<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=surat.xls");//ganti nama sesuai keperluan
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
<table width=100%>
<tr>
    <td colspan='8' align="center"><b>PEMERINTAH KOTA MADIUN<br> DINAS KESEHATAN<br></b>
    Jln. Lintas Manggopoh Pasaman (Simpang Sago) <br> Telp. (0752) 76458, Kode Pos. 26451<br></td>
</tr> 
</table>

<table width=100%>
<tr>
    <td colspan='8' align="center"><b>SURAT PERINTAH TUGAS</b></td>
</tr> 
<tr>
    <td colspan='8' align="center"><p>Nomor : <?php echo "$d[no_kegiatan]"; ?></p></td>
</tr> 
</table>

<table width='100%'>
<tr><td  colspan='8' width='85px'>Dasar :</td></tr>
<?php 
  $dasar = mysql_query("SELECT * FROm phpmu_dasar where id_kegiatan='$_GET[id]'");
  $no = 1;
  while ($d = mysql_fetch_array($dasar)){
      echo "<tr><td valign=top>$no.</td> <td colspan='7'>$d[keterangan]</td></tr>";
      $no++;
  }
?>
</table>
<br>
<table width=100%>
<tr>
    <td colspan='8' align="center"><b>KEPALA DINAS KESEHATAN<br> MENUGASKAN</b></td>
</tr> 
</table>

Kepada :
<table width='100%'>
<?php 
  $pelaksana = mysql_query("SELECT * FROM phpmu_pelaksana a 
                              JOIN phpmu_karyawan b ON a.id_karyawan=b.id_karyawan
                                JOIN phpmu_golongan c ON b.id_golongan=c.id_golongan 
                                  where a.id_kegiatan='$_GET[id]'");
  $no = 1;
  while ($dp = mysql_fetch_array($pelaksana)){
      echo "<tr><td width='35px' valign=top>$no.</td><td width=90px>Nama/Nip</td> <td colspan='6'>: $dp[nama_karyawan] / $dp[nip_karyawan]</td></tr>
            <tr><td valign=top></td><td>Jabatan/Gol</td>  <td colspan='6'>: $dp[jabatan_karyawan] / $dp[golongan]<br></td></tr>";
      $no++;
      $pengikut = mysql_query("SELECT a.id_pengikut, a.id_karyawan as idk, b.id_karyawan, b.nip_karyawan, b.nama_karyawan, a.nama_pengikut, a.keterangan FROM phpmu_pengikut a 
                                                                    LEFT JOIN phpmu_karyawan b ON a.id_karyawan=b.id_karyawan 
                                                                        where a.id_pelaksana='$dp[id_pelaksana]'");
      $noo = 1;
      while ($pp = mysql_fetch_array($pengikut)){
          if ($pp[idk]=='0'){
               $nip  = '-';
               $nama = $pp[nama_pengikut];
          }elseif($pp[idk]!='0'){
                $nip  = $pp[nip_karyawan];
                $nama = $pp[nama_karyawan];
          }
               echo "<tr>
                      <td></td>
                      <td>Pengikut $noo</td>
                      <td colspan='6'>: $nama / $nip ($pp[keterangan])</td>
                    </tr>";
          $noo++;
      }
  }
      $de = mysql_fetch_array(mysql_query("SELECT * FROM phpmu_kegiatan where id_kegiatan='$_GET[id]'"));
       $selisih = ((abs(strtotime ($de[tgl_mulai]) - strtotime ($de[tgl_akhir])))/(60*60*24))+1;
      echo "<tr><td width='35px' valign=top><br></td><td width=110px><br>Dalam Rangka</td> <td colspan='6'><br>: $de[nama_kegiatan]</td></tr>
            <tr><td width='35px' valign=top></td><td>Tujuan</td> <td colspan='6'>: $de[tempat_kegiatan] </td></tr>
            <tr><td width='35px' valign=top></td><td>Lamanya</td> <td colspan='6'>: $selisih Hari</td></tr>
            <tr><td width='35px' valign=top></td><td>Terhitung Mulai Tanggal</td> <td colspan='6'>: ".tgl_indo($de[tgl_mulai])." s.d ".tgl_indo($de[tgl_akhir])."</td></tr>
            <tr><td width='35px' valign=top></td><td>Biaya</td> <td colspan='6'>: $de[biaya]</td></tr>";
?>
</table>

<p>Setelah melaksanakan tugas ini agar membuat laporan.<br>
   Demikian Surat Perintah Tugas Ini diberikan unutk dipergunakan sebagaimana Mestinya.</p>



<br>
<table width=100%>
  <tr>
    <td colspan='6' >
    </td>
    <td>
        <table>
            <tr><td width="130px">Dikeluarkan di </td><td>: Madiun</td></tr>
            <tr><td>Pada Tanggal </td><td>: <?php echo tgl_indo(date("Y-m-d")); ?></td></tr>
        </table><br>
        <center>
          KEPALA DINAS KESEHATAN / Plh,<br>
          KEPALA DINAS KESEHATAN,<br>
          SEKRETARIS<br><br><br><br>

          <u>Nama Lengkap</u><br>
          Pembina Utama Madya<br>
          NIP. 00000000 000000 0 000
        </center>
    </td>
  </tr>
</table> 
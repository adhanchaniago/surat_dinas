<style type="text/css">
  @font-face {
    font-family: myFirstFont;
    src: url(fonts/ufonts.com_square721-bt-roman.ttf);
  }

  p, u, td{
    font-family: myFirstFont;
  }
</style>
<title>Print Data Surat Tugas</title>
<body onload="window.print()">
<?php
error_reporting(0);
session_start();
include "koneksi.php"; 
$d = mysql_fetch_array(mysql_query("SELECT * FROM phpmu_kegiatan where id_kegiatan='$_GET[id]'"));
?>
<table border=0 width=100%>
<tr>
    <td align="center" rowspan='3' width='88px'><img width='85px' src='images/logo.png'></td>
</tr> 
<tr>
    <td align="center"><h3 style='margin-bottom:-5px' align=center>PEMERINTAH KOTA MADIUN<br> DINAS KESEHATAN</h3></td>
    <td align="center" rowspan='3' width='88px'>&nbsp;</td>
</tr> 
<tr>
    <td align="center"><p>Jln. Lintas Manggopoh Pasaman (Simpang Sago) <br> Telp. (0752) 76458, Kode Pos. 26451</p></td>
</tr> 
</table>
<hr style='border:1px solid #000'>

<table width=100%>
<tr>
    <td align="center"><h3 style='margin-bottom:-5px' align=center>SURAT PERINTAH TUGAS</h3></td>
</tr> 
<tr>
    <td align="center"><p>Nomor : <?php echo "$d[no_kegiatan]"; ?></p></td>
</tr> 
</table>

<table width='100%'>
<tr><td width='65px' colspan='2'>Dasar :</td></tr>
<?php 
  $dasar = mysql_query("SELECT * FROm phpmu_dasar where id_kegiatan='$_GET[id]'");
  $no = 1;
  while ($d = mysql_fetch_array($dasar)){
      echo "<tr><td valign=top>$no.</td> <td>$d[keterangan]</td></tr>";
      $no++;
  }
?>
</table>
<br>
<table width=100%>
<tr>
    <td align="center"><h3 style='margin-bottom:-5px' align=center>KEPALA DINAS KESEHATAN<br> MENUGASKAN</h3></td>
</tr> 
</table>

Kepada :
<table width='100%'>
<?php 
  $pelaksana = mysql_query("SELECT * FROM phpmu_pelaksana a 
                              JOIN phpmu_karyawan b ON a.id_karyawan=b.id_karyawan
                                JOIN phpmu_golongan c ON b.id_golongan=c.id_golongan 
                                  where a.id_kegiatan='$_GET[id]' ORDER BY b.nama_karyawan ASC");
  $no = 1;
  while ($dp = mysql_fetch_array($pelaksana)){
      echo "<tr><td width='35px' valign=top>$no.</td><td width=70px>Nama/Nip</td> <td>: $dp[nama_karyawan] / $dp[nip_karyawan]</td></tr>
            <tr><td valign=top></td><td>Jabatan/Gol</td>  <td>: $dp[jabatan_karyawan] / $dp[golongan]<br></td></tr>";
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
                      <td>: $nama / $nip ($pp[keterangan])</td>
                    </tr>";
          $noo++;
      }
  }
      $de = mysql_fetch_array(mysql_query("SELECT * FROM phpmu_kegiatan where id_kegiatan='$_GET[id]'"));
       $selisih = ((abs(strtotime ($de[tgl_mulai]) - strtotime ($de[tgl_akhir])))/(60*60*24))+1;
      echo "<tr><td width='35px' valign=top><br></td><td width=110px><br>Dalam Rangka</td> <td><br>: $de[nama_kegiatan]</td></tr>
            <tr><td width='35px' valign=top></td><td>Tujuan</td> <td>: $de[tempat_kegiatan] </td></tr>
            <tr><td width='35px' valign=top></td><td>Lamanya</td> <td>: $selisih Hari</td></tr>
            <tr><td width='35px' valign=top></td><td>Terhitung Mulai Tanggal</td> <td>: ".tgl_indo($de[tgl_mulai])." s.d ".tgl_indo($de[tgl_akhir])."</td></tr>
            <tr><td width='35px' valign=top></td><td>Biaya</td> <td>: $de[biaya]</td></tr>";
?>
</table>

<p>Setelah melaksanakan tugas ini agar membuat laporan.<br>
   Demikian Surat Perintah Tugas Ini diberikan unutk dipergunakan sebagaimana Mestinya.</p>



<br>
<table width=100%>
  <tr>
    <td width="30%">
    </td>

    <td width="30%">

    </td>

    <td >
        <?php $p = mysql_fetch_array(mysql_query("SELECT * FROM tanda_tangan where id_tanda_tangan='$_GET[jabatan]'")); ?>
        <table>
            <tr><td width="130px">Dikeluarkan di </td><td>: Madiun</td></tr>
            <tr><td>Pada Tanggal </td><td>: <?php echo tgl_indo(date("Y-m-d")); ?></td></tr>
        </table><br>
        <center>
          <?php echo $p[jabatan]; ?><br><br><br><br>

          <u><?php echo $p[nama_lengkap]; ?></u><br>
          <?php echo $p[keterangan]; ?><br>
          NIP. <?php echo $p[nip]; ?>
        </center>
    </td>
  </tr>
</table> 
</body>
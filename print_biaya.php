<title>Print Data Rincian Biaya</title>
<body onload="window.print()">
<?php
error_reporting(0);
session_start();
include "koneksi.php"; 
$d = mysql_fetch_array(mysql_query("SELECT * FROM phpmu_kegiatan where id_kegiatan='$_GET[id]'"));
?>
<table border="0">
  <tr><td width="160px">Tahun Anggaran</td>   <td>: <?php echo "$d[tahun_anggaran]"; ?></td></tr>
  <tr><td>Nomor Bukti</td>                    <td>: <?php echo "$d[no_bukti]"; ?></td></tr>   
  <tr><td>Mata Anggaran</td>                  <td>: <?php echo "$d[mata_anggaran]"; ?></td></tr> 
</table>

<h2 align=center>Riancian Biaya Perjalanan Dinas</h2>

<table border="0">
  <tr><td width="160px">Lampiran SPD Nomor</td>   <td>: <?php echo "$d[no_kegiatan]"; ?></td></tr>
  <tr><td>Tanggal</td>                            <td>: <?php echo tgl_indo($d[tgl_mulai]); ?></td></tr>   
</table>

                        <table width='100%' border=1>
                                <tr bgcolor='green' class="alert alert-success">
                                    <th style='color:#fff' width='50px' scope="row">No</th>
                                    <th style='color:#fff'>Rincian Biaya</th>
                                    <th style='color:#fff'>Jumlah</th>
                                    <th style='color:#fff'>Keterangan</th>
                                </tr>
                            <?php 
                                $biaya = mysql_query("SELECT * FROM phpmu_biaya where id_kegiatan='$_GET[id]' ORDER BY id_biaya");
                                $no = 1;
                                while ($b = mysql_fetch_array($biaya)){
                                    echo "<tr>
                                            <td>$no</td>
                                            <td>$b[rincian_biaya]</td>
                                            <td>".rupiah($b[jumlah])."</td>
                                            <td>$b[keterangan]</td>
                                          </tr>";
                                      $no++;
                                }
                                $j = mysql_fetch_array(mysql_query("SELECT sum(jumlah) as total FROM phpmu_biaya where id_kegiatan='$_GET[id]'"));
                                    echo "<tr bgcolor=lightblue>
                                            <td></td>
                                            <td><b>JUMLAH</b></td>
                                            <td><b>".rupiah($j[total])."</b></td>
                                            <td></td>
                                          </tr>";
                            ?>
                        </table>
<br><br>
<table width=100%>
  <tr>
    <td colspan="2"></td>
    <td width="286"></td>
  </tr>
  <tr>
    <td width="38%">Telah Dibayar Sejumlah :<br>
    <?php echo rupiah($j[total]); ?> <br>
    Bendahara Pengeluaran <br>
    Sekretariat PT. Maju Lancar
    </td>

    <td width="30%">
        Lunas Dibayar<br>
        bagian Keuangan
    </td>

    <td >
        Jakarta, <?php tgl_indo(date("Y-m-d")); ?><br>
        Telah Menerima Uang Sebesar : <br>
        <?php echo rupiah($j[total]); ?> <br>
        Yang Menerima <br>
    </td>

  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table> 
</body>
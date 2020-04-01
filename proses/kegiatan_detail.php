<?php
    $e = mysql_fetch_array(mysql_query("SELECT * FROM phpmu_kegiatan where id_kegiatan='$_GET[id]'"));

    if (isset($_POST[update])){
                        mysql_query("UPDATE phpmu_inbox SET asal_surat       = '$_POST[a]',
                                                            tanggal_surat    = '$_POST[b]',
                                                            tanggal_masuk_agenda    = '$_POST[c]',
                                                            no_surat         = '$_POST[d]',
                                                            id_perihal       = '$_POST[e]',
                                                            disposisi        = '$_POST[f]',
                                                            isi_disposisi    = '$_POST[g]',
                                                            lokasi_arsip     = '$_POST[i]' where id_inbox='$_GET[id]'");
                                       
                        echo "<script>window.alert('Sukses Update Data Surat Masuk .');
                                window.location='inbox'</script>";
    }
?>

            <h4 style='padding-top:15px'>Detail Data Kegiatan</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading">
                <strong></strong>
                <a class='pull-right btn btn-success open-AddBookDialog' data-id='<?php echo $_GET[id]; ?>' style='margin-top:-9px; margin-right:5px' data-toggle='modal' href='#' data-target='#print' title='Print Surat Perjalanan Dinas'><i class='fa fa-print'></i> Print Surat</a> 
                <a target='_BLANK' href='print_biaya.php?id=<?php echo $_GET[id]; ?>' style='margin-top:-9px; margin-right:5px' class="pull-right btn btn-info">Print Rincian Biaya</a><br> 
            </div>
                <div class="panel-body">
                    <ul id="myTabs" class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active"><a href="#datakegiatan" id="datakegiatan-tab" role="tab" data-toggle="tab" aria-controls="datakegiatan" aria-expanded="true">Data Kegiatan</a></li>
                      <li role="presentation" class=""><a href="#datadasar" role="tab" id="datadasar-tab" data-toggle="tab" aria-controls="datadasar" aria-expanded="false">Data Dasar</a></li>
                      <li role="presentation" class=""><a href="#datapelaksana" role="tab" id="datapelaksana-tab" data-toggle="tab" aria-controls="datapelaksana" aria-expanded="false">Data Pelaksana</a></li>
                      <li role="presentation" class=""><a href="#datapengikutpelaksana" role="tab" id="datapengikutpelaksana-tab" data-toggle="tab" aria-controls="datapengikutpelaksana" aria-expanded="false">Data Pengikut Pelaksana</a></li>
                      <li role="presentation" class=""><a href="#databiaya" role="tab" id="databiaya-tab" data-toggle="tab" aria-controls="databiaya" aria-expanded="false">Data Biaya</a></li>
                    </ul><br>

                    <div id="myTabContent" class="tab-content">
                      <div role="tabpanel" class="tab-pane fade active in" id="datakegiatan" aria-labelledby="datakegiatan-tab">
                        <table class="table table-condensed table-hover">
                          <thead>
                            <tr><th width='190px' scope="row">No Kegiatan</th>    <th class='text-danger'><?php echo $record['no_kegiatan']; ?></th></tr>
                          </thead>
                          <tbody>
                            <tr><th scope="row">Mata Anggaran</th>     <td><?php if ($e['mata_anggaran']==''){ echo "<i class='text-danger'>Data Masih Kosong</i>"; }else{ echo $e['mata_anggaran']; } ?></td></tr>
                            <tr><th scope="row">No Bukti</th>          <td><?php if ($e['no_bukti']==''){ echo "<i class='text-danger'>Data Masih Kosong</i>"; }else{ echo $e['no_bukti']; } ?></td></tr>
                            <tr><th scope="row">Tahun Anggaran</th>    <td><?php if ($e['tahun_anggaran']==''){ echo "<i class='text-danger'>Data Masih Kosong</i>"; }else{ echo $e['tahun_anggaran']; } ?> Tahun</td></tr>
                            <tr><th scope="row">Nama Kegiatan</th>     <td><?php echo $e['nama_kegiatan']; ?></td></tr>
                            <tr><th scope="row">Tanggal Mulai</th>     <td><?php echo tgl_indo($e[tgl_mulai]); ?></td></tr>
                            <tr><th scope="row">Tanggal Akhir</th>     <td><?php echo tgl_indo($e[tgl_akhir]); ?></td></tr>
                            <tr><th scope="row">Tempat Kegiatan</th>   <td><?php if ($e['tempat_kegiatan']==''){ echo "<i class='text-danger'>Data Masih Kosong</i>"; }else{ echo $e['tempat_kegiatan']; } ?></td></tr>
                            <tr><th scope="row">Biaya</th>     <td><?php echo $e['biaya']; ?></td></tr>
                          </tbody>
                        </table>
                       </div>

                      <div role="tabpanel" class="tab-pane fade" id="datadasar" aria-labelledby="datadasar-tab">
                            <table class="table table-condensed table-bordered">
                              <thead>
                                <tr class="alert alert-success">
                                    <th width='50px' scope="row">No</th>
                                    <th>Keterangan</th>
                                </tr>
                              </thead>
                              <tbody>
                            <?php 
                                $dasar = mysql_query("SELECT * FROM phpmu_dasar where id_kegiatan='$_GET[id]' ORDER BY id_dasar");
                                $no = 1;
                                while ($d = mysql_fetch_array($dasar)){
                                    echo "<tr>
                                            <td>$no</td>
                                            <td>$d[keterangan]</td><td align=center><a href='index.php?view=kegiatan&act=edit&deletedasar=$d[id_dasar]&id=$_GET[id]'>Delete</a></td>
                                          </tr>";
                                      $no++;
                                }
                            ?>
                                </tbody>
                            </table>
                      </div>

                      <div role="tabpanel" class="tab-pane fade" id="datapelaksana" aria-labelledby="datapelaksana-tab">
                            <table class="table table-condensed table-bordered">
                              <thead>
                                <tr class="alert alert-success">
                                    <th width='50px' scope="row">No</th>
                                    <th>Nip</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jabatan</th>
                                    <th>Golongan</th>
                                    <th>Keterangan</th>
                                </tr>
                              </thead>
                              <tbody>
                            <?php 
                                $pelaksana = mysql_query("SELECT * FROM phpmu_pelaksana a 
                                                        JOIN phpmu_karyawan b ON a.id_karyawan=b.id_karyawan
                                                            JOIN phpmu_golongan c ON b.id_golongan=c.id_golongan  
                                                                where a.id_kegiatan='$_GET[id]' ORDER BY b.nama_karyawan");
                                $no = 1;
                                while ($p = mysql_fetch_array($pelaksana)){
                                    echo "<tr>
                                            <td>$no</td>
                                            <td>$p[nip_karyawan]</td>
                                            <td>$p[nama_karyawan]</td>
                                            <td>$p[jabatan_karyawan]</td>
                                            <td>$p[golongan] - $p[nama_golongan]</td>
                                            <td>$p[ket_pelaksana]</td>
                                          </tr>";
                                    $no++;
                                }
                            ?>
                                </tbody>
                            </table>
                      </div>

                                     <div role="tabpanel" class="tab-pane fade" id="datapengikutpelaksana" aria-labelledby="datapengikutpelaksana-tab">
                            <table class="table table-condensed table-bordered">
                              <thead>
                                <tr class="alert alert-success">
                                    <th width='50px' scope="row">No</th>
                                    <th width='180px'>Nip</th>
                                    <th>Nama Lengkap</th>
                                    <th>Keterangan</th>
                                </tr>
                              </thead>
                              <tbody>
                            <?php 
                                $pelaksana = mysql_query("SELECT * FROM phpmu_pelaksana a 
                                                        JOIN phpmu_karyawan b ON a.id_karyawan=b.id_karyawan
                                                            JOIN phpmu_golongan c ON b.id_golongan=c.id_golongan  
                                                                where a.id_kegiatan='$_GET[id]' ORDER BY b.nama_karyawan ASC");
                                $no = 1;
                                while ($p = mysql_fetch_array($pelaksana)){
                                    echo "<tr class='alert alert-warning'>
                                            <td>$no</td>
                                            <td>$p[nip_karyawan]</td>
                                            <td>$p[nama_karyawan]</td>
                                            <td>$p[ket_pelaksana]</td>
                                          </tr>";
                                          $pengikut = mysql_query("SELECT a.id_pengikut, a.id_karyawan as idk, b.id_karyawan, b.nip_karyawan, b.nama_karyawan, a.nama_pengikut, a.keterangan FROM phpmu_pengikut a 
                                                                    LEFT JOIN phpmu_karyawan b ON a.id_karyawan=b.id_karyawan 
                                                                        where a.id_pelaksana='$p[id_pelaksana]'");
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
                                                          <td>$nip</td>
                                                          <td>$nama</td>
                                                          <td>$pp[keterangan]</td>
                                                      </tr>";
                                          }
                                    $no++;
                                }
                            ?>
                                </tbody>
                            </table>
                      </div>

                      <div role="tabpanel" class="tab-pane fade" id="databiaya" aria-labelledby="databiaya-tab">
                            <table class="table table-condensed table-bordered">
                              <thead>
                                <tr class="alert alert-success">
                                    <th width='50px' scope="row">No</th>
                                    <th>Rincian Biaya</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
                                </tr>
                              </thead>
                              <tbody>
                            <?php 
                                $biaya = mysql_query("SELECT * FROM phpmu_biaya where id_kegiatan='$_GET[id]' ORDER BY id_biaya");
                                $no = 1;
                                while ($b = mysql_fetch_array($biaya)){
                                    echo "<tr>
                                            <td>$no</td>
                                            <td>$b[rincian_biaya]</td>
                                            <td>$b[jumlah]</td>
                                            <td>$b[keterangan]</td>
                                          </tr>";
                                      $no++;
                                }
                            ?>
                                </tbody>
                            </table>
                      </div>

                    </div>

                    <br><br>
                </div>
            </div>
            </div>

        <footer id="footer"> 
                <div class="text-center clearfix">
                    <p><small>&copy 2015 - Develop by Robby Prihandaya - www.phpmu.com</small>
                        <br /><br /> 
                        <a href="https://twitter.com/robbyprihandaya" class="btn btn-xs btn-circle btn-twitter"><i class="fa fa-twitter"></i></a> 
                        <a href="https://web.facebook.com/robbyprihandaya" class="btn btn-xs btn-circle btn-facebook"><i class="fa fa-facebook"></i></a> 
                        <a href="https://plus.google.com/106633506064864167239/posts" class="btn btn-xs btn-circle btn-gplus"><i class="fa fa-google-plus"></i></a> 
                    </p> 
                </div> 
        </footer>



        <div class="modal fade" id="print" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Pilih Pejabat (Tanda Tangan)</h4>
          </div>
          <div class="modal-body">
              <form target='_BLANK' class="form-horizontal" action="print_surat.php" method='GET'>
                <input type="hidden" name='id' id='bookId'>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Lengkap</label>
                  <div class="col-sm-8">
                    <select class="form-control" name="jabatan">
                            <option value='0' selected>- Pilih Pejabat -</option>
                        <?php 
                            $pejabat = mysql_query("SELECT * FROM tanda_tangan ORDER BY id_tanda_tangan");
                            while ($p = mysql_fetch_array($pejabat)){
                                echo "<option value='$p[id_tanda_tangan]'>$p[nama_lengkap]</option>"; 
                            }
                        ?>
                    </select>
                  </div>
                </div>
          </div>
          <div style='clear:both' class="modal-footer">
            <button type="submit" class="btn btn-info btn-sm">Print</button>
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-warning btn-sm"><span aria-hidden="true">Tutup</span></button>
          </div>
          </form>
        </div>
      </div>
</div>
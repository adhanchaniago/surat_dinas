<?php
    $e = mysql_fetch_array(mysql_query("SELECT * FROM phpmu_kegiatan where id_kegiatan='$_GET[id]'"));
    if (isset($_POST[update])){
    				$tglmulai = $_POST[tc]."-".$_POST[tb]."-".$_POST[ta];
            		$tglselesai = $_POST[tf]."-".$_POST[te]."-".$_POST[td];
                        mysql_query("UPDATE phpmu_kegiatan SET no_kegiatan      = '$_POST[a]',
                                                            mata_anggaran       = '$_POST[b]',
                                                            no_bukti            = '$_POST[c]',
                                                            tahun_anggaran      = '$_POST[d]',
                                                            nama_kegiatan       = '$_POST[e]',
                                                            tgl_mulai           = '$tglmulai',
                                                            tgl_akhir           = '$tglselesai',
                                                            tempat_kegiatan     = '$_POST[h]',
                                                            biaya               = '$_POST[i]' where id_kegiatan='$_POST[id]'");
                                       
                        echo "<script>document.location='index.php?view=kegiatan&act=edit&id=".$_POST[id]."';</script>";
    }
?>
<form action='' class="form-horizontal" method="POST" data-validate="parsley" enctype='multipart/form-data'>
            <h4 style='padding-top:15px'>Edit Data Kegiatan</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Berikut Data Kegiatan Perjalanan Dinas :</strong> 
                <button style='margin-top:-9px' type="submit" name='update' class="pull-right btn btn-info">Update Data</button>  
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
                              
                            <div class="form-group">
                            <label class="col-lg-2 control-label">No Kegiatan</label>
                                <div class="col-lg-3">
                                <input type="hidden" name='id' value='<?php echo $_GET[id]; ?>'>
                                <input type="text" name="a" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[no_kegiatan]; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                            <label class="col-lg-2 control-label">Mata Anggaran</label>
                                <div class="col-lg-3">
                                <input type="text" name="b" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[mata_anggaran]; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                            <label class="col-lg-2 control-label">No Bukti</label>
                                <div class="col-lg-3">
                                <input type="text" name="c" placeholder="" class="bg-focus form-control" value="<?php echo $e[no_bukti]; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                            <label class="col-lg-2 control-label">Tahun Anggaran</label>
                                <div class="col-lg-2">
                                <input type="text" name="d" placeholder="" class="bg-focus form-control" data-required="true" value="<?php echo $e[tahun_anggaran]; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Nama Kegiatan</label>
                                <div class="col-lg-8">
                                <textarea placeholder="" name='e' rows="3" class="form-control" data-trigger="keyup"><?php echo $e[nama_kegiatan]; ?></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Tanggal Mulai</label>
                                <div class="col-lg-8">
                                <span class="combodate">
                                  <select name='ta' class="day form-control" style="width: auto;">
                                    <?php 
                                      $ex = explode('-',$e[tgl_mulai]);
                                      $tglmulai = $ex[2];
                                      $blnmulai = $ex[1];
                                      $thnmulai = $ex[0];
                                      for($n=1; $n<=31; $n++){
                                      	if ($tglmulai==$n){
                                      		echo "<option value='$n' selected>$n</option>";
                                      	}else{
	                                        echo "<option value='$n'>$n</option>";
	                                    }
                                      }
                                    ?>
                                  </select>&nbsp;&nbsp;
                                  <select name='tb' class="month form-control" style="width: auto;"><option value=""></option>
                                    <?php 
                                      $bln = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                                      
                                      $bulanm = substr($blnmulai,0,1);
                                      $bulana = substr($blnmulai,1,1);
                                      if ($bulanm == '0'){ $blnmu = $bulana; }else{ $blnmu = $blnmulai; }

                                      for($n=1; $n<=12; $n++){
                                      	if ($blnmu==$n){
                                      		echo "<option value='$n' selected>$bln[$n]</option>";
                                      	}else{
	                                        echo "<option value='$n'>$bln[$n]</option>";
	                                    }
                                      }
                                    ?>
                                  </select>&nbsp;&nbsp;
                                  <select name='tc' class="year form-control" style="width: auto;">
                                    <?php
                                      for($n=2013; $n<=date("Y"); $n++){ 
                                      	if ($thnmulai==$n){
                                      		echo "<option value='$n' selected>$n</option>";
                                      	}else{
	                                        echo "<option value='$n'>$n</option>";
	                                    }
                                        
                                      } 
                                    ?>
                                  </select>
                                </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Tanggal Akhir</label>
                                <div class="col-lg-8">
                                <span class="combodate">
                                  <select name='td' class="day form-control" style="width: auto;">
                                    <?php 
                                      $exs = explode('-',$e[tgl_akhir]);
                                      $tglakhir = $exs[2];
                                      $blnakhir = $exs[1];
                                      $thnakhir = $exs[0];
                                      for($n=1; $n<=31; $n++){
                                        if ($tglakhir==$n){
                                      		echo "<option value='$n' selected>$n</option>";
                                      	}else{
	                                        echo "<option value='$n'>$n</option>";
	                                    }
                                      }
                                    ?>
                                  </select>&nbsp;&nbsp;
                                  <select name='te' class="month form-control" style="width: auto;"><option value=""></option>
                                    <?php 
                                      $bulanmb = substr($blnmulai,0,1);
                                      $bulanab = substr($blnmulai,1,1);
                                      if ($bulanmb == '0'){ $blnmub = $bulanab; }else{ $blnmub = $blnakhir; }
                                      for($n=1; $n<=12; $n++){
                                        if ($blnmub==$n){
                                      		echo "<option value='$n' selected>$bln[$n]</option>";
                                      	}else{
	                                        echo "<option value='$n'>$bln[$n]</option>";
	                                    }
                                      }
                                    ?>
                                  </select>&nbsp;&nbsp;
                                  <select name='tf' class="year form-control" style="width: auto;">
                                    <?php
                                      for($n=2013; $n<=date("Y"); $n++){ 
                                        if ($thnakhir==$n){
                                      		echo "<option value='$n' selected>$n</option>";
                                      	}else{
	                                        echo "<option value='$n'>$n</option>";
	                                    }
                                      } 
                                    ?>
                                  </select>
                                </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Tempat Kegiatan</label>
                                <div class="col-lg-6">
                                <input type="text" name="h" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[tempat_kegiatan]; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Biaya</label>
                                <div class="col-lg-9">
                                <input type="text" name="i" placeholder="" data-required="true" class="bg-focus form-control" value="<?php echo $e[biaya]; ?>">
                                </div>
                            </div>
                       </div>

                      <div role="tabpanel" class="tab-pane fade" id="datadasar" aria-labelledby="datadasar-tab">
                            <a style='margin-bottom:3px' class='btn btn-primary' href='' data-toggle="modal" data-target="#tambahdasar"><i class='fa fa-plus'></i> Tambahkan Data Dasar</a>
                            <table class="table table-condensed table-bordered">
                              <thead>
                                <tr class="alert alert-success">
                                    <th width='50px' scope="row">No</th>
                                    <th>Keterangan</th>
                                    <th width='80px'>Action</th>
                                </tr>
                              </thead>
                              <tbody>
                            <?php 
                                $dasar = mysql_query("SELECT * FROM phpmu_dasar where id_kegiatan='$_GET[id]' ORDER BY id_dasar");
                                $no = 1;
                                while ($d = mysql_fetch_array($dasar)){
                                    echo "<tr>
                                            <td>$no</td>
                                            <td>$d[keterangan]</td>
                                            <td align=center><a href='index.php?view=kegiatan&act=edit&deletedasar=$d[id_dasar]&id=$_GET[id]'>Delete</a></td>
                                          </tr>";
                                      $no++;
                                }
                            ?>
                                </tbody>
                            </table>
                      </div>

                      <div role="tabpanel" class="tab-pane fade" id="datapelaksana" aria-labelledby="datapelaksana-tab">
                            <a style='margin-bottom:3px' class='btn btn-primary' href='' data-toggle="modal" data-target="#tambahpelaksana"><i class='fa fa-plus'></i> Tambahkan Data Pelaksana</a>
                            <table class="table table-condensed table-bordered">
                              <thead>
                                <tr class="alert alert-success">
                                    <th width='50px' scope="row">No</th>
                                    <th>Nip</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jabatan</th>
                                    <th>Golongan</th>
                                    <th>Keterangan</th>
                                    <th width='80px'>Action</th>
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
                                            <td align=center><a href='index.php?view=kegiatan&act=edit&deletepelaksana=$p[id_pelaksana]&id=$_GET[id]'>Delete</a></td>
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
                                    <th width='100px'></th>
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
                                    echo "<tr class='alert alert-warning'>
                                            <td>$no</td>
                                            <td>$p[nip_karyawan]</td>
                                            <td>$p[nama_karyawan]</td>
                                            <td>$p[ket_pelaksana]</td>
                                            <td><a style='margin-bottom:3px; width:130px' class='open-AddBookDialog btn btn-info btn-sm' data-id='$p[id_pelaksana]' href='#' data-toggle='modal' data-target='#tambahpengikut'><i class='fa fa-plus'></i> Tambah Pengikut</a></td>
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
                                                          <td><a style='width:130px' class='btn btn-danger btn-sm' href='index.php?view=kegiatan&act=edit&deletepengikut=$pp[id_pengikut]&id=$_GET[id]'><i class='fa fa-trash-o'></i> Delete Pengikut</a></td>
                                                      </tr>";
                                          }
                                    $no++;
                                }
                            ?>
                                </tbody>
                            </table>
                      </div>

                      <div role="tabpanel" class="tab-pane fade" id="databiaya" aria-labelledby="databiaya-tab">
                            <a style='margin-bottom:3px' class='btn btn-primary' href='' data-toggle="modal" data-target="#tambahbiaya"><i class='fa fa-plus'></i> Tambahkan Data Biaya</a>
                            <table class="table table-condensed table-bordered">
                              <thead>
                                <tr class="alert alert-success">
                                    <th width='50px' scope="row">No</th>
                                    <th>Rincian Biaya</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
                                    <th width='80px'>Action</th>
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
                                            <td align=center><a href='index.php?view=kegiatan&act=edit&deletebiaya=$d[id_biaya]&id=$_GET[id]'>Delete</a></td>
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
</form>

    <?php 
        if (isset($_POST[simpandasar])){
            mysql_query("INSERT INTO phpmu_dasar VALUES('','$_POST[id]','$_POST[a]')");
            echo "<script>document.location='index.php?view=kegiatan&act=edit&id=".$_POST[id]."';</script>";
        }

        if (isset($_GET[deletedasar])){
            mysql_query("DELETE FROM phpmu_dasar where id_dasar='$_GET[deletedasar]'");
            echo "<script>document.location='index.php?view=kegiatan&act=edit&id=".$_GET[id]."';</script>";
        }

        if (isset($_POST[simpanpelaksana])){
            mysql_query("INSERT INTO phpmu_pelaksana VALUES('','$_POST[a]','$_POST[id]','$_POST[b]')");
            echo "<script>document.location='index.php?view=kegiatan&act=edit&id=".$_POST[id]."';</script>";
        }

        if (isset($_GET[deletepelaksana])){
            mysql_query("DELETE FROM phpmu_pelaksana where id_pelaksana='$_GET[deletepelaksana]'");
            echo "<script>document.location='index.php?view=kegiatan&act=edit&id=".$_GET[id]."';</script>";
        }

        if (isset($_POST[simpanbiaya])){
            mysql_query("INSERT INTO phpmu_biaya VALUES('','$_POST[id]','$_POST[a]','$_POST[b]','$_POST[c]')");
            echo "<script>document.location='index.php?view=kegiatan&act=edit&id=".$_POST[id]."';</script>";
        }

        if (isset($_GET[deletebiaya])){
            mysql_query("DELETE FROM phpmu_biaya where id_biaya='$_GET[deletebiaya]'");
            echo "<script>document.location='index.php?view=kegiatan&act=edit&id=".$_GET[id]."';</script>";
        }

        if (isset($_POST[simpanpengikut])){
            mysql_query("INSERT INTO phpmu_pengikut VALUES('','$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]')");
            echo "<script>document.location='index.php?view=kegiatan&act=edit&id=".$_POST[id]."';</script>";
        }

        if (isset($_GET[deletepengikut])){
            mysql_query("DELETE FROM phpmu_pengikut where id_pengikut='$_GET[deletepengikut]'");
            echo "<script>document.location='index.php?view=kegiatan&act=edit&id=".$_GET[id]."';</script>";
        }
    ?>

<div class="modal fade" id="tambahdasar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambahkan Data Dasar</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="index.php?view=kegiatan&act=edit&id=<?php echo $_GET[id]; ?>" method='POST'>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Keterangan</label>
                  <div class="col-sm-8">
                    <input type='hidden' value='<?php echo $_GET[id]; ?>' name='id'>
                    <textarea rows='10' class="form-control" name="a"></textarea>
                  </div>
                </div>
                
          </div>
          <div style='clear:both' class="modal-footer">
            <button type="submit" name='simpandasar' class="btn btn-info btn-sm">Tambahkan</button>
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-warning btn-sm"><span aria-hidden="true">Tutup</span></button>
          </div>
          </form>
        </div>
      </div>
</div>

<div class="modal fade" id="tambahpelaksana" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambahkan Data Pelaksana</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="index.php?view=kegiatan&act=edit&id=<?php echo $_GET[id]; ?>" method='POST'>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Pelaksana</label>
                  <div class="col-sm-8">
                    <input type='hidden' value='<?php echo $_GET[id]; ?>' name='id'>
                    <select class="form-control" name="a">
                        <option value='0'>- Pilih -</option>
                        <?php 
                            $pelaksana = mysql_query("SELECT * FROM phpmu_karyawan ORDER BY nama_karyawan");
                            while ($p = mysql_fetch_array($pelaksana)){
                                echo "<option value='$p[id_karyawan]'> $p[nip_karyawan] - $p[nama_karyawan]</option>";
                            }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Keterangan</label>
                  <div class="col-sm-8">
                    <textarea rows='10' class="form-control" name="b"></textarea>
                  </div>
                </div>
                
          </div>
          <div style='clear:both' class="modal-footer">
            <button type="submit" name='simpanpelaksana' class="btn btn-info btn-sm">Tambahkan</button>
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-warning btn-sm"><span aria-hidden="true">Tutup</span></button>
          </div>
          </form>
        </div>
      </div>
</div>

<div class="modal fade" id="tambahbiaya" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambahkan Data Biaya</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="index.php?view=kegiatan&act=edit&id=<?php echo $_GET[id]; ?>" method='POST'>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Rincan Biaya</label>
                  <div class="col-sm-8">
                    <input type='hidden' value='<?php echo $_GET[id]; ?>' name='id'>
                    <input type="text" class="form-control" name="a">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Jumlah</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="b">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Keterangan</label>
                  <div class="col-sm-8">
                    <textarea rows='5' class="form-control" name="c"></textarea>
                  </div>
                </div>
                
          </div>
          <div style='clear:both' class="modal-footer">
            <button type="submit" name='simpanbiaya' class="btn btn-info btn-sm">Tambahkan</button>
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-warning btn-sm"><span aria-hidden="true">Tutup</span></button>
          </div>
          </form>
        </div>
      </div>
</div>


<div class="modal fade" id="tambahpengikut" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambahkan Data Pengikut</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="index.php?view=kegiatan&act=edit&id=<?php echo $_GET[id]; ?>" method='POST'>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Dari Karyawan</label>
                  <div class="col-sm-8">
                    <input type='hidden' value='<?php echo $_GET[id]; ?>' name='id'>
                    <input type='hidden' id='bookId' name='a'>
                    <select class="form-control" name="b">
                        <option value='0'>- Pilih -</option>
                        <?php 
                            $pelaksana = mysql_query("SELECT * FROM phpmu_karyawan ORDER BY nama_karyawan");
                            while ($p = mysql_fetch_array($pelaksana)){
                                echo "<option value='$p[id_karyawan]'> $p[nip_karyawan] - $p[nama_karyawan]</option>";
                            }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Pengikut</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="c" placeholder='Tulis Nama Pengikut, Jika Bukan dari Karyawan...'>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Keterangan</label>
                  <div class="col-sm-8">
                    <textarea rows='5' class="form-control" name="d"></textarea>
                  </div>
                </div>
                
          </div>
          <div style='clear:both' class="modal-footer">
            <button type="submit" name='simpanpengikut' class="btn btn-info btn-sm">Tambahkan</button>
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-warning btn-sm"><span aria-hidden="true">Tutup</span></button>
          </div>
          </form>
        </div>
      </div>
</div>
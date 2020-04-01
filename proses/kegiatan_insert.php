<?php
    if (isset($_POST[tambah])){
            $tglmulai = $_POST[tc]."-".$_POST[tb]."-".$_POST[ta];
            $tglselesai = $_POST[tf]."-".$_POST[te]."-".$_POST[td];
            mysql_query("INSERT INTO phpmu_kegiatan VALUES('','$_POST[a]','$_POST[b]','$_POST[c]',
                                '$_POST[d]','$_POST[e]','$tglmulai','$tglselesai','$_POST[h]','$_POST[i]')");
        $id = mysql_insert_id();                             
                        echo "<script>document.location='index.php?view=kegiatan&act=edit&id=".$id."';</script>";
    }
?>
<form action='' class="form-horizontal" method="POST" data-validate="parsley" enctype='multipart/form-data'>
            <h4 style='padding-top:15px'>Tambah Data Kegiatan</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong></strong> 
                    <br>
                </div>
                <div class="panel-body">   
                            <div class="form-group">
                            <label class="col-lg-2 control-label">No Kegiatan</label>
                                <div class="col-lg-3">
                                <input type="text" name="a" placeholder="" class="bg-focus form-control" data-required="true">
                                </div>
                            </div>

                            <div class="form-group">
                            <label class="col-lg-2 control-label">Mata Anggaran</label>
                                <div class="col-lg-3">
                                <input type="text" name="b" placeholder="" class="bg-focus form-control" data-required="true">
                                </div>
                            </div>

                            <div class="form-group">
                            <label class="col-lg-2 control-label">No Bukti</label>
                                <div class="col-lg-3">
                                <input type="text" name="c" placeholder="" class="bg-focus form-control">
                                </div>
                            </div>

                            <div class="form-group">
                            <label class="col-lg-2 control-label">Tahun Anggaran</label>
                                <div class="col-lg-2">
                                <input type="text" name="d" placeholder="" class="bg-focus form-control" data-required="true">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Nama Kegiatan</label>
                                <div class="col-lg-8">
                                <textarea placeholder="" name='e' rows="3"  data-required="true" class="form-control" data-trigger="keyup"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Tanggal Mulai</label>
                                <div class="col-lg-8">
                                <span class="combodate">
                                  <select name='ta' class="day form-control" style="width: auto;">
                                    <?php 
                                      echo "<option value='".date("d")."' selected>".date("d")."</option>";
                                      for($n=1; $n<=31; $n++){
                                        echo "<option value='$n'>$n</option>";
                                      }
                                    ?>
                                  </select>&nbsp;&nbsp;
                                  <select name='tb' class="month form-control" style="width: auto;"><option value=""></option>
                                    <?php 
                                      $bln = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                                      echo "<option value='".date("n")."' selected>".$bln[date("n")]."</option>";
                                      for($n=1; $n<=12; $n++){
                                        echo "<option value='$n'>$bln[$n]</option>";
                                      }
                                    ?>
                                  </select>&nbsp;&nbsp;
                                  <select name='tc' class="year form-control" style="width: auto;">
                                    <?php
                                      echo "<option value='".date("Y")."' selected>".date("Y")."</option>";
                                      for($n=2013; $n<=date("Y"); $n++){ 
                                        echo "<option value='$n'>$n</option>";
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
                                      echo "<option value='".date("d")."' selected>".date("d")."</option>";
                                      for($n=1; $n<=31; $n++){
                                        echo "<option value='$n'>$n</option>";
                                      }
                                    ?>
                                  </select>&nbsp;&nbsp;
                                  <select name='te' class="month form-control" style="width: auto;"><option value=""></option>
                                    <?php 
                                      $bln = array('','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                                      echo "<option value='".date("n")."' selected>".$bln[date("n")]."</option>";
                                      for($n=1; $n<=12; $n++){
                                        echo "<option value='$n'>$bln[$n]</option>";
                                      }
                                    ?>
                                  </select>&nbsp;&nbsp;
                                  <select name='tf' class="year form-control" style="width: auto;">
                                    <?php
                                      echo "<option value='".date("Y")."' selected>".date("Y")."</option>";
                                      for($n=2013; $n<=date("Y"); $n++){ 
                                        echo "<option value='$n'>$n</option>";
                                      } 
                                    ?>
                                  </select>
                                </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Tempat Kegiatan</label>
                                <div class="col-lg-6">
                                <input type="text" name="h" placeholder="" data-required="true" class="bg-focus form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Biaya</label>
                                <div class="col-lg-9">
                                <input type="text" name="i" placeholder="" data-required="true" class="bg-focus form-control">
                                </div>
                            </div>

                            <div class="form-group">
                            <div class="col-lg-10 pull-right">    
                            <button type="submit" name='tambah' class="btn btn-info">Simpan Data</button>                  
                            <button type="reset" class="btn btn-default">Reset</button>

                            </div>
                        </div>
                </div>
                    <br><br>
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
                    <textarea rows='10' class="form-control" name="a" required></textarea>
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
                    <textarea rows='10' class="form-control" name="b" required></textarea>
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
                    <textarea rows='5' class="form-control" name="c" required></textarea>
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
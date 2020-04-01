        <h4 style='padding-top:15px'>Semua Data Karyawan</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class='btn btn-primary' href='' data-toggle="modal" data-target="#tambahkaryawan"><i class='fa fa-plus'></i> Tambahkan Data Baru</a>
                </div>

                <div class="panel-body">
                 <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead class='alert-info'>
                    <tr>
                        <th width='50px'>No</th>
                        <th>Nip</th>
                        <th>Nama Lengkap</th>
                        <th>Jabatan</th>
                        <th>Golongan</th>
                        <th>Kota Tinggal</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $karyawan = mysql_query("SELECT * FROM phpmu_karyawan a JOIN phpmu_golongan b ON a.id_golongan=b.id_golongan ORDER BY a.id_karyawan ASC");
                        $no = 1;
                        while ($i = mysql_fetch_array($karyawan)){
                            echo "<tr class='gradeX'>
                                    <td>$no</td>
                                    <td>$i[nip_karyawan]</td>
                                    <td>$i[nama_karyawan]</td>
                                    <td>$i[jabatan_karyawan]</td>
                                    <td>$i[nama_golongan]</td>
                                    <td>$i[kota_karyawan]</td>
                                    <td style='width:70px'><center>
                                       <a class='open-AddBookDialog' data-id='$i[id_karyawan]' data-id1='$i[nip_karyawan]' data-id2='$i[nama_karyawan]' data-id3='$i[jabatan_karyawan]' data-id4='$i[id_golongan]' data-id5='$i[kota_karyawan]' style='margin-right:10px' data-toggle='modal' href='#' data-target='#editkaryawan' title='Edit Data ini'><i class='fa fa-pencil-square-o'></i></a>
	                                   <a href='index.php?view=karyawan&delete=$i[id_karyawan]' title='Hapus Data ini' onclick=\"return confirm('Apakah anda Yakin Data ini Dihapus?')\" ><i class='fa fa-trash-o'></i></a>
                                    </center></td>
                                 </tr>";
                            $no++;
                        }
                    ?>

                    </tbody>
                    </table>
                </div>
            </div>
            </div>
            <!-- /Basic Data Tables Example --> 

<?php 
    if (isset($_POST[simpan])){
        mysql_query("INSERT INTO phpmu_karyawan VALUES('','$_POST[d]','$_POST[a]','$_POST[b]','$_POST[c]','$_POST[e]')");
            echo "<script>document.location='karyawan.mu';</script>";
    }

    if (isset($_POST[update])){
      if ($_POST[d]==''){ $d = $_POST[dd]; }else{ $d = $_POST[d]; }
        mysql_query("UPDATE phpmu_karyawan SET nip_karyawan     = '$_POST[a]',
                                               nama_karyawan    = '$_POST[b]',
                                               jabatan_karyawan = '$_POST[c]',
                                               id_golongan      = '$d',
                                               kota_karyawan    = '$_POST[e]' where id_karyawan='$_POST[id]'");
            echo "<script>document.location='karyawan.mu';</script>";
    }

    if (isset($_GET[delete])){
        mysql_query("DELETE FROM phpmu_karyawan where id_karyawan='$_GET[delete]'");
        echo "<script>document.location='karyawan.mu';</script>";
    }
?>
<div class="modal fade" id="tambahkaryawan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambahkan Karyawan</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="karyawan.mu" method='POST'>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nip</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="a" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="b" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Jabatan</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="c" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Golongan</label>
                  <div class="col-sm-5">
                    <select name="d" class="form-control"> 
                    <option value='' selected>- Pilih -</option>
                      <?php $gol = mysql_query("SELECT * FROM phpmu_golongan");
                        while ($r = mysql_fetch_array($gol)){
                          echo "<option value='$r[id_golongan]'>$r[golongan] - $r[nama_golongan]</option>";
                      } ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Kota Tinggal</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="e" required>
                  </div>
                </div>
                
          </div>
          <div style='clear:both' class="modal-footer">
            <button type="submit" name='simpan' class="btn btn-info btn-sm">Tambahkan</button>
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-warning btn-sm"><span aria-hidden="true">Tutup</span></button>
          </div>
          </form>
        </div>
      </div>
</div>

<div class="modal fade" id="editkaryawan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Karyawan</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="karyawan.mu" method='POST'>
                <input type="hidden" name='id' id='bookId'>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nip</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="a" id='bookId1' required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="b" id='bookId2' required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Jabatan</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="c" id='bookId3' required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Golongan</label>
                  <div class="col-sm-8">
                    <input type="hidden" class="form-control" name="dd" id='bookId4' required>
                    <select class="col-sm-5" style='pull-left' name="d" class="form-control"> 
                    <option value='' selected>- Pilih -</option>
                      <?php $gol = mysql_query("SELECT * FROM phpmu_golongan");
                        while ($r = mysql_fetch_array($gol)){
                          echo "<option value='$r[id_golongan]'>$r[golongan] - $r[nama_golongan]</option>";
                      } ?>
                    </select>
                    <input style='margin-left:5px' class="col-sm-2" type="text" class="form-control" id='bookId4' readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Kota Tinggal</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="e" id='bookId5' required>
                  </div>
                </div>
                
          </div>
          <div style='clear:both' class="modal-footer">
            <button type="submit" name='update' class="btn btn-info btn-sm">Update</button>
            <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-warning btn-sm"><span aria-hidden="true">Tutup</span></button>
          </div>
          </form>
        </div>
      </div>
</div>

             <footer id="footer"> 
                <div class="text-center clearfix">
                    <p><small>&copy 2015 </small>
                        <br /><br /> 
                        <a href="https://twitter.com/robbyprihandaya" class="btn btn-xs btn-circle btn-twitter"><i class="fa fa-twitter"></i></a> 
                        <a href="https://web.facebook.com/robbyprihandaya" class="btn btn-xs btn-circle btn-facebook"><i class="fa fa-facebook"></i></a> 
                        <a href="https://plus.google.com/106633506064864167239/posts" class="btn btn-xs btn-circle btn-gplus"><i class="fa fa-google-plus"></i></a> 
                    </p> 
                </div> 
            </footer>
        <h4 style='padding-top:15px'>Semua Pejabat</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class='btn btn-primary' href='' data-toggle="modal" data-target="#tambahpejabat"><i class='fa fa-plus'></i> Tambahkan Data Baru</a>
                </div>

                <div class="panel-body">
                 <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead class='alert-info'>
                    <tr>
                        <th width='50px'>No</th>
                        <th>Jabatan</th>
                        <th>Nama Lengkap</th>
                        <th>Keterangan</th>
                        <th>NIP</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $tandatangan = mysql_query("SELECT * FROM tanda_tangan ORDER BY id_tanda_tangan ASC");
                        $no = 1;
                        while ($i = mysql_fetch_array($tandatangan)){
                            echo "<tr class='gradeX'>
                                    <td>$no</td>
                                    <td>$i[jabatan]</td>
                                    <td>$i[nama_lengkap]</td>
                                    <td>$i[keterangan]</td>
                                    <td>$i[nip]</td>
                                    <td style='width:70px'><center>
                                       <a class='open-AddBookDialog' data-id='$i[id_tanda_tangan]' data-id1='$i[jabatan]' data-id2='$i[nama_lengkap]' data-id3='$i[keterangan]' data-id4='$i[nip]' style='margin-right:10px' data-toggle='modal' href='#' data-target='#editpejabat' title='Edit Data ini'><i class='fa fa-pencil-square-o'></i></a>
	                                   <a href='index.php?view=pejabat&delete=$i[id_tanda_tangan]' title='Hapus Data ini' onclick=\"return confirm('Apakah anda Yakin Data ini Dihapus?')\" ><i class='fa fa-trash-o'></i></a>
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
        mysql_query("INSERT INTO tanda_tangan VALUES('','$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]')");
            echo "<script>document.location='pejabat.mu';</script>";
    }

    if (isset($_POST[update])){
        mysql_query("UPDATE tanda_tangan SET jabatan         = '$_POST[a]',
                                             nama_lengkap    = '$_POST[b]',
                                             keterangan      = '$_POST[c]',
                                             nip             = '$_POST[d]' where id_tanda_tangan='$_POST[id]'");
            echo "<script>document.location='pejabat.mu';</script>";
    }

    if (isset($_GET[delete])){
        mysql_query("DELETE FROM tanda_tangan where id_tanda_tangan='$_GET[delete]'");
        echo "<script>document.location='pejabat.mu';</script>";
    }
?>
<div class="modal fade" id="tambahpejabat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambahkan Pejabat</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="pejabat.mu" method='POST'>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Jabatan</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="a" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Lengkap</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="b" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Keterangan</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="c" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">NIP</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="d" required>
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

<div class="modal fade" id="editpejabat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Golongan</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="pejabat.mu" method='POST'>
                <input type="hidden" name='id' id='bookId'>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Jabatan</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="a" id='bookId1' required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Lengkap</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="b" id='bookId2' required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Keterangan</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="c" id='bookId3' required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">NIP</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="d" id='bookId4' required>
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
                        <a href="https://twitter.com/" class="btn btn-xs btn-circle btn-twitter"><i class="fa fa-twitter"></i></a> 
                        <a href="https://web.facebook.com/" class="btn btn-xs btn-circle btn-facebook"><i class="fa fa-facebook"></i></a> 
                        <a href="https://plus.google.com/106633506064864167239/posts" class="btn btn-xs btn-circle btn-gplus"><i class="fa fa-google-plus"></i></a> 
                    </p> 
                </div> 
            </footer>
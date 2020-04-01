        <h4 style='padding-top:15px'>Semua Data Golongan</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class='btn btn-primary' href='' data-toggle="modal" data-target="#tambahgolongan"><i class='fa fa-plus'></i> Tambahkan Data Baru</a>
                </div>

                <div class="panel-body">
                 <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead class='alert-info'>
                    <tr>
                        <th width='50px'>No</th>
                        <th>Golongan</th>
                        <th>Nama Golongan</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $golongan = mysql_query("SELECT * FROM phpmu_golongan ORDER BY id_golongan ASC");
                        $no = 1;
                        while ($i = mysql_fetch_array($golongan)){
                            echo "<tr class='gradeX'>
                                    <td>$no</td>
                                    <td>$i[golongan]</td>
                                    <td>$i[nama_golongan]</td>
                                    <td style='width:70px'><center>
                                       <a class='open-AddBookDialog' data-id='$i[id_golongan]' data-id1='$i[golongan]' data-id2='$i[id_tingkat_biaya]' data-id3='$i[nama_golongan]' style='margin-right:10px' data-toggle='modal' href='#' data-target='#editgolongan' title='Edit Data ini'><i class='fa fa-pencil-square-o'></i></a>
	                                   <a href='index.php?view=golongan&delete=$i[id_golongan]' title='Hapus Data ini' onclick=\"return confirm('Apakah anda Yakin Data ini Dihapus?')\" ><i class='fa fa-trash-o'></i></a>
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
        mysql_query("INSERT INTO phpmu_golongan VALUES('','$_POST[a]','$_POST[c]')");
            echo "<script>document.location='golongan.mu';</script>";
    }

    if (isset($_POST[update])){
        mysql_query("UPDATE phpmu_golongan SET golongan         = '$_POST[a]',
                                               nama_golongan    = '$_POST[c]' where id_golongan='$_POST[id]'");
            echo "<script>document.location='golongan.mu';</script>";
    }

    if (isset($_GET[delete])){
        mysql_query("DELETE FROM phpmu_golongan where id_golongan='$_GET[delete]'");
        echo "<script>document.location='golongan.mu';</script>";
    }
?>
<div class="modal fade" id="tambahgolongan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Tambahkan Golongan</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="golongan.mu" method='POST'>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Golongan</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="a" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Golongan</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="c" required>
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

<div class="modal fade" id="editgolongan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div style='margin:0px; padding-top:0px' class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Edit Golongan</h4>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" action="golongan.mu" method='POST'>
                <input type="hidden" name='id' id='bookId'>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Golongan</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="a" id='bookId1' required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">Nama Golongan</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="c" id='bookId3' required>
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
                    <p><small>&copy 2015</small>
                        <br /><br /> 
                        <a href="https://twitter.com/robbyprihandaya" class="btn btn-xs btn-circle btn-twitter"><i class="fa fa-twitter"></i></a> 
                        <a href="https://web.facebook.com/robbyprihandaya" class="btn btn-xs btn-circle btn-facebook"><i class="fa fa-facebook"></i></a> 
                        <a href="https://plus.google.com/106633506064864167239/posts" class="btn btn-xs btn-circle btn-gplus"><i class="fa fa-google-plus"></i></a> 
                    </p> 
                </div> 
            </footer>
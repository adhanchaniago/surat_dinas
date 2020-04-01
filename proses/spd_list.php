        <h4 style='padding-top:15px'>Semua Data Surat Perjalanan Dinas</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                <br>
                </div>

                <div class="panel-body">
                 <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead class='alert-info'>
                    <tr>
                        <th width='50px'>No</th>
                        <th>No Kegiatan</th>
                        <th>Nama Kegiatan</th>
                        <th><center>Action</center></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $kegiatan = mysql_query("SELECT * FROM phpmu_kegiatan ORDER BY id_kegiatan DESC");
                        $no = 1;
                        while ($i = mysql_fetch_array($kegiatan)){
                            echo "<tr class='gradeX'>
                                    <td>$no</td>
                                    <td>$i[no_kegiatan]</td>
                                    <td>$i[nama_kegiatan]</td>
                                    <td><center>
                                     <a class='btn btn-info btn-sm open-AddBookDialog' data-id='$i[id_kegiatan]' style='margin-right:10px;' data-toggle='modal' href='#' data-target='#print' title='Print Surat Perjalanan Dinas'><i class='fa fa-print'></i> Print Surat</a>
                                     <a target='_BLANK' style='margin-right:10px' href='excel_surat.php?id=$i[id_kegiatan]' title='Export Excel Surat Perjalanan Dinas' class='btn btn-info btn-sm'><i class='fa fa-file'></i> Excel</a>
                                     <a target='_BLANK' style='margin-right:10px' href='print_biaya.php?id=$i[id_kegiatan]' title='Print Biaya Perjalanan Dinas' class='btn btn-success btn-sm'><i class='fa fa-book'></i> Print Biaya</a>
                                     <a target='_BLANK' style='margin-right:10px' href='excel_biaya.php?id=$i[id_kegiatan]' title='Export Excel Biaya Perjalanan Dinas' class='btn btn-success btn-sm'><i class='fa fa-file'></i> Excel</a>
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
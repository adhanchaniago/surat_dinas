        <h4 style='padding-top:15px'>Semua Data Kegiatan</h4>
            <!-- Basic Data Tables Example -->
            <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class='btn btn-primary' href='index.php?view=kegiatan&act=tambah'><i class='fa fa-plus'></i> Tambahkan Data Baru</a>
                </div>

                <div class="panel-body">
                 <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead class='alert-info'>
                    <tr>
                        <th width='50px'>No</th>
                        <th>No Kegiatan</th>
                        <th>Tahun</th>
                        <th>Nama Kegiatan</th>
                        <th>Tempat</th>
                        <th>Action</th>
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
                                    <td align=center>$i[tahun_anggaran]</td>
                                    <td>$i[nama_kegiatan]</td>
                                    <td>$i[tempat_kegiatan]</td>
                                    <td style='width:90px'><center>
                                     <a style='margin-right:10px' href='index.php?view=kegiatan&act=detail&id=$i[id_kegiatan]' title='Lihat Detail Data ini'><i class='fa fa-search'></i></a>
                                     <a style='margin-right:10px' href='index.php?view=kegiatan&act=edit&id=$i[id_kegiatan]' title='Edit Data ini'><i class='fa fa-pencil-square-o'></i></a>
                                     <a href='index.php?view=kegiatan&delete=$i[id_kegiatan]' title='Hapus Data ini' onclick=\"return confirm('Apakah anda Yakin Data ini Dihapus?')\" ><i class='fa fa-trash-o'></i></a>
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
    if (isset($_GET[delete])){
        mysql_query("DELETE FROM phpmu_kegiatan where id_kegiatan='$_GET[delete]'");
        echo "<script>document.location='kegiatan.mu';</script>";
    }
?>

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
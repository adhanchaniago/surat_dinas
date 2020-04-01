<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Dashboard - Aplikasi Surat Perjalanan Dinas</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/bootstrap-overrides.css" type="text/css" rel="stylesheet" />
    <!-- theme -->
    <link rel="stylesheet" type="text/css" href="css/theme/default.css" />
    <!-- libraries -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="css/elements/dataTables.bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/elements/tables.css" />
    <link rel="stylesheet" type="text/css" href="css/elements/form.css" />
    <link rel="stylesheet" type="text/css" href="css/elements/bootstrap-wysihtml5.css" />
    <!-- open sans font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400italic,700italic,400,700" rel="stylesheet" type="text/css">

</head>
<body>
    <header class="navbar navbar-inverse navbar-fixed-top" role="banner">
        <?php include "header.php"; ?>
    </header>
    <!-- sidebar -->
    <div id="sidebar-nav">
        <div class="profile-hidder">
            <ul class="nav">
                    <li class="nav-profile">
                        <div class="image">
                            <a href="javascript:;"><img src="images/user_1.jpg" alt=""></a>
                        </div>
                        <div class="info">
                            <a href=""><?php echo $_SESSION[namalengkap]; ?> <b class="caret"></b></a>
                        </div>
                    </li>
            </ul>
        </div>
        <?php include "menu.php"; ?>
    </div>
    <!-- end sidebar -->

    <!-- main container -->
    <div class="content">
        <div id="pad-wrapper">
        <?php
            if ($_GET[view]=='home' OR $_GET[view]==''){
                include "dashboard.php";
            }elseif ($_GET[view]=='user'){
                include "user.php";
            }elseif ($_GET[view]=='account'){
                include "account.php";
            }elseif ($_GET[view]=='tingkatbiaya'){
                include "master_data/tingkat_biaya.php";
            }elseif ($_GET[view]=='golongan'){
                include "master_data/golongan.php";
            }elseif ($_GET[view]=='pejabat'){
                include "master_data/tandatangan.php";
            }elseif ($_GET[view]=='karyawan'){
                include "master_data/karyawan.php";
            }elseif ($_GET[view]=='kegiatan'){
                if ($_GET[act]==''){
                    include "proses/kegiatan.php";
                }elseif($_GET[act]=='edit'){
                    include "proses/kegiatan_edit.php";
                }elseif($_GET[act]=='detail'){
                    include "proses/kegiatan_detail.php";
                }elseif($_GET[act]=='tambah'){
                    include "proses/kegiatan_insert.php";
                }
            }elseif ($_GET[view]=='spdlist'){
                include "proses/spd_list.php";
            }
        ?>
        </div>
    </div>
    <!-- /main container -->

    <!--post modal-->
            <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                           <h4><strong>Delete Confirmation</strong></h4>
                        </div>
                        <div class="modal-body"><p></p></div>
                        <div class="modal-footer">
                            <button class="btn btn-default btn-sm" data-dismiss="modal" aria-hidden="true">Close</button>
                            <button data-dismiss="modal" class="btn btn-danger btn-sm" id="btnYes">Confirm</button> 
                        </div>
                    </div>
                </div>
            </div>

    <!-- scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/theme.js"></script>

    <script src="js/dashboard/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/dashboard/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/dashboard/jquery.sparkline.min.js"></script>

    <script src="js/dashboard/waypoints.min.js"></script>
    <script src="js/dashboard/jquery.counterup.min.js"></script>
    <script src="js/bootstrap-modal.js"></script>

    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>

    <script src="js/tables/jquery.jeditable.js"></script>
    <script src="js/tables/jquery.dataTables.js"></script>
    <script src="js/tables/dataTables.bootstrap.js"></script>

    <script src="js/form/app.js"></script>
    <script src="js/form/app.plugin.js"></script>
    <script src="js/form/datepicker/bootstrap-datepicker.js"></script>
    <script src="js/form/slider/bootstrap-slider.js"></script>
    <script src="js/form/bootstrap.file-input.js"></script>    
    <script src="js/form/combodate/moment.min.js"></script>
    <script src="js/form/combodate/combodate.js"></script>
    <script src="js/form/parsley/parsley.min.js"></script>

    <script src="js/tables/jquery.peity.min.js"></script>
    <script src="js/tables/peity-demo.js"></script>
    <script src="js/tables/icheck.min.js"></script>

    <!--wysiwyg editor -->
    <script src="js/editor/wysihtml5-0.3.0.js"></script>
    <script src="js/editor/bootstrap3-wysihtml5.js"></script>

<script type="text/javascript">
      $(document).on("click", ".open-AddBookDialog", function () {
           var myBookId = $(this).data('id');
           var myBookId1 = $(this).data('id1');
           var myBookId2 = $(this).data('id2');
           var myBookId3 = $(this).data('id3');
           var myBookId4 = $(this).data('id4');
           var myBookId5 = $(this).data('id5');
           var myBookId6 = $(this).data('id6');
           $(".modal-body #bookId").val( myBookId );
           $(".modal-body #bookId1").val( myBookId1 );
           $(".modal-body #bookId2").val( myBookId2 );
           $(".modal-body #bookId3").val( myBookId3 );
           $(".modal-body #bookId4").val( myBookId4 );
           $(".modal-body #bookId5").val( myBookId5 );
           $(".modal-body #bookId6").val( myBookId6 );
      });
</script>
     <script type="text/javascript">
        //wysihtml5
       $('.textarea').wysihtml5({
        "font-styles": true, //Font styling, e.g. h1, h2, etc. Default true
        "emphasis": true, //Italics, bold, etc. Default true
        "lists": true, //(Un)ordered lists, e.g. Bullets, Numbers. Default true
        "html": true, //Button which allows you to edit the generated HTML. Default false
        "link": true, //Button to insert a link. Default true
        "image": true, //Button to insert an image. Default true,
        "color": false, //Button to change color of font
        "size": 'sm' //Button size like sm, xs etc.
    });


            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>



    <script type="text/javascript">
       $(document).ready(function() {
            $('.dataTables-example').dataTable();

            /* Init DataTables */
            var oTable = $('#editable').dataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( 'example_ajax.html', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>

</body>
</html>
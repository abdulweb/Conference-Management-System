<?php
include 'includes/connection.php';
session_start();
if (empty($_SESSION['user']) || $_SESSION['user'] == '' || $_SESSION['user'] == null) 
{
    header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Admin</title>
            <!-- plugin css -->
        <link rel="stylesheet" href="../plugins/magnific-popup/css/magnific-popup.css" />
        <link rel="stylesheet" href="../plugins/jquery-datatables-editable/datatables.css" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">

        <script src="assets/js/modernizr.min.js"></script>

    </head>
    <style type="text/css">
        .save{
            display: none;
        }
    </style>
    <body class="fixed-left" style="color: rgb(51,51,51);">

        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner">
                  <div class="spinner-wrapper">
                    <div class="rotator">
                      <div class="inner-spin"></div>
                      <div class="inner-spin"></div>
                    </div>
                  </div>
                </div>
            </div>
        </div>

        <!-- Begin page -->
        <div id="wrapper">

            <?php
                include 'includes/topbar.php';
                include 'includes/sidebar.php';
            ?>
            



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                    <!-- Breadcrum start row -->
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Dashboard </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="index.php">Dashboard</a>
                                        </li>
                                        
                                        <li class="active">
                                            Manage Payment
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!--  breadcrum end row -->

                        <!-- start row of grid -->
                          <div class="row">
                        <div class="col-sm-12">
                        <div class="card-box table-responsive">
                           <div class="panel panel-primary">
                               <div class="panel-heading"> <i class="fa fa-user"> </i> <strong>List of Registered Author </strong></div>
                               <div class="panel-body">
                                    <h4 class="m-t-0 header-title"><b></b></h4>
                            <p class="text-muted font-13 m-b-30">
                               
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Conference Name</th>
                                    <th>User Type</th>
                                </tr>
                                </thead>
                                    <?php
                                        $sql = mysqli_query($con, "SELECT DISTINCT id,conf_id,user_email,end_date, payment_status from conference_reg_tb  ORDER BY id") or die(mysqli_error($con));
                                        $counter = 1;
                                        while ($row = mysqli_fetch_assoc($sql)) {
                                          $auth_email = $row['user_email'];
                                          $select = mysqli_query($con, "select * from user_tb where email = '$auth_email'");
                                          while ($data_fetch = mysqli_fetch_assoc($select)) {
                                            
                                            

                                          
                                          ?>
                                            
                                <tbody>
                                 <tr id="row<?php echo $row['id'];?>">
                                    <td><?=$counter?></td>
                                    <td id="title<?php echo $row['id'] ?>"><?=$row['user_email']?></td>
                                    <td id="user<?php echo $row['id'] ?>"><?php
                                        if($row['payment_status'] ==0){
                                            echo '<span class="label label-danger">Pending</span></p>';
                                           } 
                                           else{
                                            echo '<span class="label label-success">Processed</span></p>';
                                           }
                                            ?>
                                        
                                    </td>
                                    <td>
                                        <?php 
                                        $conf_id = $row['conf_id'];
                                            $sqlx = mysqli_query($con, "SELECT * FROM conference_tb where id = '$conf_id'") or die(mysqli_error($con));
                                            $get = mysqli_fetch_assoc($sqlx);
                                            echo $get['conf_title'];
                                        ?>
                                    </td>
                                    <td><?=strtoupper($data_fetch['usertype'])?></td>
                                    
                                </tr>
                                </tbody>
                                   <?php
                                // }
                                    $counter++; }
                               }
                                    ?>
                            </table>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
                        <!-- end row of grid -->



                    </div> <!-- container -->

                </div> <!-- content -->

               <!-- footer section start-->
               <?php
                include 'includes/footer.php';
               ?>
               <!-- footer end -->

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- Example jquery -->
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables/dataTables.bootstrap.js"></script>

        <script src="../plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="../plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="../plugins/datatables/jszip.min.js"></script>
        <script src="../plugins/datatables/pdfmake.min.js"></script>
        <script src="../plugins/datatables/vfs_fonts.js"></script>
        <script src="../plugins/datatables/buttons.html5.min.js"></script>
        <script src="../plugins/datatables/buttons.print.min.js"></script>
        <script src="../plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="../plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="../plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="../plugins/datatables/dataTables.colVis.js"></script>
        <script src="../plugins/datatables/dataTables.fixedColumns.min.js"></script>
         <!-- init -->
        <script src="assets/pages/jquery.datatables.init.js"></script>
        
        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

       <script>

            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
                $('#datatable-colvid').DataTable({
                    "dom": 'C<"clear">lfrtip',
                    "colVis": {
                        "buttonText": "Change columns"
                    }
                });
                $('#datatable-scroller').DataTable({
                    ajax: "../plugins/datatables/json/scroller-demo.json",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 1,
                        rightColumns: 1
                    }
                });
            });
            TableManageButtons.init();


  function edit_fee(id)
{
    //alert('hey');
 //var title=document.getElementById("title"+id).innerHTML;
 var user=document.getElementById("user"+id).innerHTML;
 var author=document.getElementById("author"+id).innerHTML;
 document.getElementById("user"+id).innerHTML="<input type='text' class='form-control' autofocus id='user_text"+id+"' value='"+user+"'>";
 document.getElementById("author"+id).innerHTML="<input type='text' class='form-control' id='author_text"+id+"' value='"+author+"'>";
    
 document.getElementById("edit_button"+id).style.display="none";
 document.getElementById("save_button"+id).style.display="block";
}

function save_row(id)
{
 var user=document.getElementById("user_text"+id).value;
 var author=document.getElementById("author_text"+id).value;
    
 $.ajax
 ({
  type:'post',
  url:'modify_records.php',
  data:{
   edit_fee:'edit_fee',
   row_id:id,
   user:user,
   author:author,
  },
  success:function(response) {
   if(response=="success")
   {
    document.getElementById("user"+id).innerHTML=user;
    document.getElementById("author"+id).innerHTML=author;
    document.getElementById("edit_button"+id).style.display="block";
    document.getElementById("save_button"+id).style.display="none";
    alert('Record Updated Successfully');
   }
   else{
    alert('something goes wrong');
   }
  }

 });
}

        </script>
       

    </body>
</html>
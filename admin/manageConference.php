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
                                        <li>
                                            <a href="#">Pages </a>
                                        </li>
                                        <li class="active">
                                            Blank Page
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
                               <div class="panel-heading"> <i class="fa fa-desktop"> </i> <strong>List of conference </strong></div>
                               <div class="panel-body">
                                    <h4 class="m-t-0 header-title"><b>Buttons example</b></h4>
                            <p class="text-muted font-13 m-b-30">
                               
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Date & Time</th>
                                    <th>Venue</th>
                                    <th></th>
                                </tr>
                                </thead>
                                    <?php
                                        $sql = mysqli_query($con, "select * from conference_tb") or die(mysqli_error($con));
                                        $counter = 1;
                                        while ($row = mysqli_fetch_assoc($sql)) {?>
                                            
                                <tbody>
                                 <tr id="row<?php echo $row['id'];?>">
                                    <td><?=$counter?></td>
                                    <td id="title<?php echo $row['id'] ?>"><?=$row['conf_title']?></td>
                                    <td id="desc<?php echo $row['id'] ?>"><?=$row['conf_desc']?></td>
                                    <td id="date_time<?php echo $row['id'] ?>"><?=$row['conf_date'] . " "."by"." ". $row['conf_time']?></td>
                                    <td id="venue<?php echo $row['id'] ?>"><?=$row['conf_venue']?></td>
                                    

                                    <td style="padding-left: 20px;">
                                        <a href="#"  class="on-editing save" id="save_button<?php echo $row['id'];?>" onclick="save_row('<?php echo $row['id'];?>');"><i class="fa fa-save"></i></a>

                                        <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>

                                        <a href="#"  id="edit_button<?php echo $row['id'];?>" class="on-default edit-row" onclick="edit_row('<?php echo $row['id'];?>');"><i class="fa fa-pencil" style="margin-right: 5px;"></i> </a>

                                        <a href="#" class="on-default remove-row" onclick="delete_row('<?php echo $row['id'];?>');"><i class="fa fa-trash-o"></i></a>
                                    </td>
                                </tr>
                                </tbody>
                                   <?php
                               $counter++;}
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


  function edit_row(id)
{
    //alert('hey');
 var title=document.getElementById("title"+id).innerHTML;
 var desc=document.getElementById("desc"+id).innerHTML;
 var date_time=document.getElementById("date_time"+id).innerHTML;
 var venue=document.getElementById("venue"+id).innerHTML;
 var fee=document.getElementById("fee"+id).innerHTML;

 document.getElementById("title"+id).innerHTML="<input type='text' class='form-control' autofocus id='title_text"+id+"' value='"+title+"'>";
 document.getElementById("desc"+id).innerHTML="<input type='text' class='form-control' id='desc_text"+id+"' value='"+desc+"'>";
 document.getElementById("date_time"+id).innerHTML="<input type='text' class='form-control' id='date_time_text"+id+"' value='"+date_time+"'>";
 document.getElementById("venue"+id).innerHTML="<input type='text' class='form-control' id='venue_text"+id+"' value='"+venue+"'>";
 document.getElementById("fee"+id).innerHTML="<input type='text'  id='fee_text"+id+"' value='"+fee+"'>";
    
 document.getElementById("edit_button"+id).style.display="none";
 document.getElementById("save_button"+id).style.display="block";
}

function save_row(id)
{

     // alert('hey');
 var title=document.getElementById("title_text"+id).value;
 var desc=document.getElementById("desc_text"+id).value;
 var date_time=document.getElementById("date_time_text"+id).value;
 var venue=document.getElementById("venue_text"+id).value;
 var fee=document.getElementById("fee_text"+id).value;
    
 $.ajax
 ({
  type:'post',
  url:'modify_records.php',
  data:{
   edit_row:'edit_row',
   row_id:id,
   title:title,
   desc:desc,
   date_time:date_time,
   venue:venue
  },
  success:function(response) {
   if(response=="success")
   {
    document.getElementById("title"+id).innerHTML=title;
    document.getElementById("desc"+id).innerHTML=desc;
    document.getElementById("date_time"+id).innerHTML=date_time;
    document.getElementById("venue"+id).innerHTML=venue;
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
// delete row
function delete_row(id)
{
    // confirming delete
    if (confirm("Are You Sure you want to delete?") == true)
    {

     $.ajax
     ({
      type:'post',
      url:'modify_records.php',
      data:{
       delete_row:'delete_row',
       row_id:id,
      },
      success:function(response) {
       if(response=="success")
       {
        var row=document.getElementById("row"+id);
        row.parentNode.removeChild(row);
        alert('Record Deleted Successfully');
       }
      }
     });

    }//end of confirm
    else{

    }
}
        </script>
       

    </body>
</html>
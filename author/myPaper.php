<?php
include '..\admin/includes/connection.php';
session_start();
$message = $boi = $msg ='';
$user_email = $_SESSION['user'];
if (empty($_SESSION['user']) || $_SESSION['user'] == '' || $_SESSION['user'] == null) {
    header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include 'headlink.php';
        ?>

    </head>


    <body class="fixed-left">

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
                include '..\admin/includes/topbar.php';
                include '..\admin/includes/sidebar.php';
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
                                    <h4 class="page-title">My Papers </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="index.php">Dashboard</a>
                                        </li>
                                        
                                        <li class="active">
                                            Paper Uploaded
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
                               <div class="panel-heading"> <i class="fa fa-desktop"> </i> <strong>List of Paper uploaded </strong></div>
                               <div class="panel-body">
                                    <h4 class="m-t-0 header-title"><b></b></h4>
                            <p class="text-muted font-13 m-b-30">
                               
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th> Conference Title</th>
                                    <th>Paper</th>
                                    <th> No of Reviewer Attach</th>
                                    <th>paper status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                    <?php
                                        $sql = mysqli_query($con, "select * from upload_document where email = '$user_email'") or die(mysqli_error($con));
                                        $counter = 1;
                                        while ($row = mysqli_fetch_assoc($sql)) {
                                          $conf_id = $row['conf_id'];
                                          $select = mysqli_query($con, "select * from conference_tb where id = '$conf_id'");
                                          while ($rows = mysqli_fetch_assoc($select)) {
                                            //check number of review
                                            $check = mysqli_query($con, "select * from reviewer_author where");
                                          
                                          ?>
                                            
                                <tbody>
                                 <tr >
                                    <td><?=$counter?></td>
                                    <td ><?=$rows['conf_title']?></td>
                                    <td >
                                    <form action="read_document.php" method="get">
                                        <input type="hidden" name="get_read" value="<?=$row['id']?>">
                                       <button class="btn btn-warning  btn-xs" type="submit" >VIEW</button>  
                                    </form>
                                    </td>
                                    <td >
                                        <?=mysqli_num_rows(mysqli_query($con, "SELECT * from upload_document where email = '$user_email' and conf_id = '$conf_id'  and reviewer <> '' "));?>
                                    </td>
                                    <td>
                                        <?php
                                            // echo mysqli_num_rows(mysqli_query($con, "select status from upload_document where email ='$user_email'"));
                                            if ($row['status'] == 0) {
                                                echo '<button class="btn btn-warning  btn-sm ">pending</button>';
                                            }
                                            elseif ($row['status'] ==1) {
                                                echo '<button class="btn btn-success  btn-xs">Approve</button>';
                                            }
                                            else{
                                                echo '<button class="btn btn-danger  btn-xs">Rejected</button>';
                                            }
                                        ?>
                                    </td>
                                    <td style="padding-left: 20px;">
                                        <a href="paper_review.php?id=<?php echo htmlentities($row['id']);?>"  class="on-editing save"><i class="fa fa-desktop" style="font-size: 20px;"></i></a>

                                        <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>

                                        <a href="#"  id="edit_button<?php echo $row['id'];?>" class="on-default edit-row" onclick="edit_fee('<?php echo $row['id'];?>');"><i class="fa fa-trash" style="margin-left: 10px; font-size: 20px;"></i> </a>

                                        
                                    </td>
                                </tr>
                                </tbody>
                                   <?php
                                 }
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
                include '..\admin/includes/footer.php';
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

        <?php
        include 'js.php';
        ?>
    </body>
</html>
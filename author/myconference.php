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
                                        <li>
                                            <a href="conference.php">Conference</a>
                                        </li>
                                        
                                        <li class="active">
                                           Registered Conference
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
                               <div class="panel-heading"> <i class="fa fa-desktop"> </i> <strong>List of Registered conferences </strong></div>
                               <div class="panel-body">
                                    <h4 class="m-t-0 header-title"><b></b></h4>
                            <p class="text-muted font-13 m-b-30">
                               
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th> Conference Title</th>
                                    <th>Start Date</th>
                                    <th>End Date </th>
                                    <th>Price</th>
                                    <th></th>
                                    
                                </tr>
                                </thead>
                                    <?php
                                        $sql = mysqli_query($con, "select * from conference_reg_tb where user_email = '$user_email'") or die(mysqli_error($con));
                                        $counter = 1;
                                        while ($row = mysqli_fetch_assoc($sql)) {
                                          $conf_id = $row['conf_id'];
                                          $select = mysqli_query($con, "select * from conference_tb where id = '$conf_id'");
                                          while ($rows = mysqli_fetch_assoc($select)) {
                                            $get_fee = mysqli_query($con,"select * from fee_tb where conf_id = '$conf_id'");
                                            while ($fees = mysqli_fetch_assoc($get_fee)) {
                                            
                                            
                                          
                                          ?>
                                            
                                <tbody>
                                 <tr >
                                    <td><?=$counter?></td>
                                    <td ><?=$rows['conf_title']?></td>
                                    <td><?=$rows['conf_date']?></td>
                                    <td ><?=$rows['conf_end_date']?> </td>
                                    <td ><?=$fees['author']?></td>
                                    <td></td>
                                   
                                </tr>
                                </tbody>
                                   <?php
                                 }
                             $counter++;}
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
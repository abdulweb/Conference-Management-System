<?php
 error_reporting(0);
include '..\admin/includes/connection.php';
$_SESSION['message'] ='';
session_start();
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
                                    <h4 class="page-title">Available Conference </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="index.php">Dashboard</a>
                                        </li>
                                       
                                        <li class="active">
                                           Conference
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!--  breadcrum end row -->

                        <!-- start row of grid -->
                      <div class="row">
                      <?php
                      echo $_SESSION['message'];
                         $sql = mysqli_query($con, "SELECT * FROM conference_tb ORDER BY id DESC");
                         if (mysqli_num_rows($sql) > 0) {
                             while ($row = mysqli_fetch_assoc($sql)) {
                                $image_back = $row['conf_image'];
                               // echo "<script>alert('$image_back')</script>";
                     ?>
                            <div class="property-card property-horizontal" style="height: auto;">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="property-image" style="background:  url('<?= '..\admin/'.$image_back;?>') center center / cover no-repeat;">
                                    <img src="<?= '..\admin/'.$image_back;?>" width ="350" height ="280">
                                        <span class="property-label label label-warning">Conference image</span>
                                    </div>
                                </div>
                                <!-- /col 4 -->
                                <div class="col-sm-8">
                                    <div class="property-content" style="height: auto;">
                                        <div class="listingInfo" style="border-bottom: none;">
                                            <div class="">
                                            <h3> 
                                                <a href="#" class="text-blue"><?=$row['conf_title']?> </a>
                                            </h3>
                                                <!-- <h4 class="text-success m-t-0"><span>Conference Price: </span><?=$row['conf_fee']?></h4> -->
                                            </div>
                                            <div class="" style="text-align: justify;padding-bottom: 30px;">
                                                
                                                <p class="text-muted"> Venue<i class="mdi mdi-map-marker-radius m-r-5"></i><?=$row['conf_venue'] ." ". "On ". " " .$row['conf_date']." ". "By ". " " .$row['conf_time'] ?></p>

                                                <p class="font-15 text-muted m-b-0" style="height: auto;"><?=$row['conf_desc']?></p>
                                            </div>
                                        </div>
                                        <div class="property-action" style="margin-top: 18px;">
                                            <a href="#" target="new_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="280 particpate"><i class="mdi mdi-view-grid"></i><span>280</span></a>
                                            <a href="#" target="new_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="4 Bedroom House"><i class="mdi mdi-hotel"></i><span>4</span></a>
                                            <a href="#" target="new_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="2 Parking space"><i class="mdi mdi-car"></i><span>2</span></a>
                                            <a href="#" target="new_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="24h Electricity"><i class="mdi mdi-battery-charging-80"></i><span> 24H</span></a>
                                            <div class="pull-right">
                                                <a href="conf-register.php?id=<?php echo htmlentities($row['id']);?>" class="btn btn-success btn-rounded"><i class="mdi mdi-account-check"></i><span>Register</span></a>
                                            </div>
                                        </div>
                                        <!-- end. Card actions -->
                                    </div>
                                </div>
                                <!-- /col 8 -->
                            </div>
                            <!-- /inner row -->
                        </div>
                        <!-- End property item -->

                            <?php
                                    }
                                }
                                else{
                                    echo '<p class="text-center">No Conference Available</p>';
                                }
                           ?>
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
        unset($_SESSION['message']);
        ?>
    </body>
</html>
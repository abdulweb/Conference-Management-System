<?php
    include 'connection.php';
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="conference management system">
        <meta name="description" content="UDUS CMS">
        <meta name="author" content="abdulrasheed abdulrahedd">
        <meta name="author" content="Abdullahi Muustapha">

        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <title>Conference Management System</title>

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css">

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body>


       <?php
        include 'topnav.php';
        $get_id = $_GET['id'];
        $query = mysqli_query($con, "select * from fee_tb where conf_id = '$get_id'");
        $rows = mysqli_fetch_assoc($query);
        $sql = mysqli_query($con,"select * from conference_tb where id = '$get_id'");
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['conf_name'] = $row['conf_title'];
       ?>
        <div class="wrapper">
            <div class="container">
                    
                 <h2 class="text-center" id="conference-title" style="margin-top: 8px;margin-bottom: 18px;">Select Registration Type</h2>
                 <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <div class="property-card">
                            <div class="property-image" style="background: url('cssslider_files/csss_images1/im2.jpg') center center / cover no-repeat; height: 190px;">
                                <span class="property-label label label-warning">user registration</span>
                            </div>

                            <div class="property-content">
                                <div class="listingInfo">
                                    <div class="">
                                        
                                    </div>
                                    <div class="">
                                        <h3 class=""><a href="#" class="text-blue"><?=$row['conf_title']?></a></h3>
                                        <h4>Conference Fee : <span class="text-success m-t-0" style="font-style: italic;"><?=$rows['user']?></span> </h4>

                                        <div class="row text-center">
                                            <div class="col-xs-7 col-xs-offset-2">
                                                <h4>2</h4>
                                                <p class="text-overflow" title="Parking Space">Registered Participant</p>
                                            </div>
                                        </div>

                                        <div class="m-t-20">
                                            <a href="participant_reg.php?id=<?php echo htmlentities($get_id);?>"><button type="button" class="btn btn-success btn-block waves-effect waves-light">Register</button></a>
                                        </div>

                                    </div>
                                </div>
                                <!-- end. Card actions -->
                            </div>
                            <!-- /inner row -->
                        </div>
                        <!-- End property item -->
                    </div>
                    <!-- end col -->

                    <div class="col-md-4 col-sm-6">
                        <div class="property-card">
                            <div class="property-image" style="background: url('cssslider_files/csss_images1/im2.jpg') center center / cover no-repeat; height: 190px;">
                                <span class="property-label label label-warning">Author registration</span>
                            </div>

                            <div class="property-content">
                                <div class="listingInfo">
                                    <div class="">
                                        
                                    </div>
                                    <div class="">
                                        <h3 class=""><a href="#" class="text-blue"><?=$row['conf_title']?></a></h3>
                                        <h4>Conference Fee : <span class="text-success m-t-0" style="font-style: italic;"><?=$rows['author']?></span> </h4>

                                        <div class="row text-center">
                                            <div class="col-xs-7 col-xs-offset-2">
                                                <h4>2</h4>
                                                <p class="text-overflow" title="Parking Space">Registered Author</p>
                                            </div>
                                        </div>

                                        <div class="m-t-20">
                                            <a href="author_reg.php?id=<?php echo htmlentities($get_id);?>"><button type="button" class="btn btn-success btn-block waves-effect waves-light">Register</button></a>
                                        </div>

                                    </div>
                                </div>
                                <!-- end. Card actions -->
                            </div>
                            <!-- /inner row -->
                        </div>
                        <!-- End property item -->
                    </div>
                    <!-- end col -->


                    <div class="col-md-4 col-sm-6">
                        <div class="property-card">
                            <div class="property-image" style="background: url('cssslider_files/csss_images1/im2.jpg') center center / cover no-repeat; height: 190px;">
                                <span class="property-label label label-warning">Reviwer registration</span>
                            </div>

                            <div class="property-content">
                                <div class="listingInfo">
                                    <div class="">
                                        
                                    </div>
                                    <div class="">
                                        <h3 class=""><a href="#" class="text-blue"><?=$row['conf_title']?></a></h3>
                                        <h4>Conference Fee : <span class="text-success m-t-0" style="font-style: italic;">Free</span> </h4>

                                        <div class="row text-center">
                                            <div class="col-xs-7 col-xs-offset-2">
                                                <h4>2</h4>
                                                <p class="text-overflow" title="Parking Space">Reviwer Participant</p>
                                            </div>
                                        </div>

                                        <div class="m-t-20">
                                            <a href="reviewer_reg.php?id=<?php echo htmlentities($get_id);?>"><button type="button" class="btn btn-success btn-block waves-effect waves-light">Register</button></a>
                                        </div>

                                    </div>
                                </div>
                                <!-- end. Card actions -->
                            </div>
                            <!-- /inner row -->
                        </div>
                        <!-- End property item -->
                    </div> <!-- end col -->

                    
                </div>

                
            <!-- footer section -->
            <?php
            include 'footer.php';
            ?>
            <!-- end of footer -->
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


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

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
<?php
session_start();
if (empty($_SESSION['user']) || $_SESSION['user'] == '' || $_SESSION['user'] == null) {
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
        <title>Zircos - Responsive Admin Dashboard Template</title>

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
                                            <a href="#">Zircos</a>
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
                            <div class="col-lg-3 col-md-6">
                                <div class="card-box widget-box-two widget-two-info">
                                    <i class="mdi mdi-chart-areaspline widget-two-icon"></i>
                                    <div class="wigdet-two-content text-white">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">No of Conference</p>
                                        <h2 class="text-white"><span data-plugin="counterup">34578</span> <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                                        
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-3 col-md-6">
                                <div class="card-box widget-box-two widget-two-danger">
                                    <i class="mdi mdi-chart-areaspline widget-two-icon"></i>
                                    <div class="wigdet-two-content text-white">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Total Income</p>
                                        <h2 class="text-white"><span data-plugin="counterup">34578</span> <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                                        
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-3 col-md-6">
                                <div class="card-box widget-box-two widget-two-primary">
                                    <i class="mdi mdi-chart-areaspline widget-two-icon"></i>
                                    <div class="wigdet-two-content text-white">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Statistics</p>
                                        <h2 class="text-white"><span data-plugin="counterup">34578</span> <small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                                        
                                    </div>
                                </div>
                            </div><!-- end col -->
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

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
<?php
include '../connection.php';
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
        <meta name="description" content="conference management system">
        <meta name="description" content="UDUS CMS">
        <meta name="author" content="abdulrasheed abdulrahedd">
        <meta name="author" content="Abdullahi Muustapha">

        <link rel="shortcut icon" href="..\assets/images/favicon.ico">

        <title>Conference Management System</title>

        <!-- App css -->
        <link href="..\assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="..\assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="..\assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="..\assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="..\assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="..\assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="..\assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">

        <script src="..\assets/js/modernizr.min.js"></script>


    </head>


    <body>


       <?php
        include 'include/topnav.php';
       ?>
        <div class="wrapper">
            <div class="container">
                    
                    <div class="row">
                        <div class="col-md-12">
                             <div class="property-card property-horizontal" style="height: auto; margin-top: 40px;">
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="property-content" style="height: auto; ">
                                       <h3>welcome <?=$_SESSION['user']?></h3>
                                    </div>
                                </div>
                                <!-- /col 8 -->
                            </div>
                            <!-- /inner row -->
                        </div>
                        </div>
                    </div>
                 

                
            <!-- footer section -->
            <?php
            include 'include/footer.php';
            ?>
            <!-- end of footer -->
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


        <!-- jQuery  -->
        <script src="..\assets/js/jquery.min.js"></script>
        <script src="..\assets/js/bootstrap.min.js"></script>
        <script src="..\assets/js/detect.js"></script>
        <script src="..\assets/js/fastclick.js"></script>
        <script src="..\assets/js/jquery.blockUI.js"></script>
        <script src="..\assets/js/waves.js"></script>
        <script src="..\assets/js/jquery.slimscroll.js"></script>
        <script src="..\assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="..\assets/js/jquery.core.js"></script>
        <script src="..\assets/js/jquery.app.js"></script>

    </body>
</html>
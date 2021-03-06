<?php
    include 'connection.php';
    error_reporting(0);
    $sql = mysqli_query($con, "select * from user_tb where usertype ='reviewer'") or die (mysqli_error($con));
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
       ?>
        <div class="wrapper">
            <div class="container">
                    
                 <div class="row">
                            <div class="col-xs-12">
                                <div class="page-title-box text-right">
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="index.php">Home</a>
                                        </li>
                                        <li class="active">
                                            Reviewers
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        
                                    
                               
                 <div class="row">
                     <div class="col-md-12">
                         <div class="card-box">
                            <h4 class="m-t-0 header-title"><b>Available Reviwers</b></h4>
                            <p class="text-muted m-b-30 font-13">The Listed Reviwers below are trusted and .</p>

                            <?php
                                while ($rows = mysqli_fetch_assoc($sql)) {
                                $user_email = $rows['email'];
                                $query = mysqli_query($con, "select * from user_profile where email = '$user_email'");
                                while ($data = mysqli_fetch_assoc($query)) {?>

                             <div>
                                <div class="media">
                                    <div class="media-left media-middle">
                                        <a href="#"> <img class="media-object img-circle" alt="64x64"
                                                          src="<?= 'reviewer/' .$data['passport']?>"
                                                          style="width: 64px; height: 64px;"> </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading"><?= $data['title'] . " " .$data['fullname']?></h4>
                                        <p><?=$data['bio']?></p>
                                        <p> specailize in <?=$data['field']?></p>
                                        <p> Contact me : <?=$data['phone'] ?> </p>
                                        <a class="mdi mdi-facebook-box" href="" style="font-size: 22px;"> <?=$data['social_name']?> </a>
                                    </div>
                                </div>
                               
                            </div>
                            <?php
                             }
                            }

                        ?>
                         </div>
                     </div>
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
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
    <style type="text/css">
        label{
           color: black; 
        }
        .required{
            color: red;
        }
    </style>

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
                                
                                <div class="col-sm-12">
                                    <div class="property-content" style="height: auto; ">
                                    
                                        <div class="card-box">
                                    <h4 class="header-title m-t-0">Participant Registration</h4>
                                    
                                            <?php
                                               // echo $message;
                                            ?>
                                            <div class="row">
                                                <div class="p-20 col-md-6" >
                                                <form action="" method="post" name="addemp">
                                                
                                                    <div class="panel panel-primary">
                                                        <div class="panel-heading">
                                                            <p class="text-white font-weight-bold font-13 m-b-10">
                                                               Field with  asterike<span class="required">(*)</span> must be fill
                                                            </p>
                                                        </div>

                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                        <label for="passWord2">Full Name: <span class="required">*</span></label>
                                                        <input type="text" name="fname" parsley-trigger="change" required
                                                                class="form-control" id="">
                                                        
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="userName">Mobile Number<span class="required">*</span></label>
                                                        <input type="number" name="mobile" parsley-trigger="change" required
                                                                class="form-control" id="">    
                                                    </div>

                                                    <div class="form-group text-right m-b-0">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit" name="regsiter" onclick="return valid();">
                                                            Submit
                                                        </button>
                                                    </div>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                 <div class="panel panel-success" style="margin-top: 24px;">
                                                     <div class="panel-heading">
                                                         <p class="text-white">Change Password</p>
                                                     </div>
                                                     <div class="panel-body">
                                                         <form method="post" action="">
                                                     <div class="form-group">
                                                        <label for="userName">Password<span class="required">*</span></label>
                                                        <input type="password" name="password" parsley-trigger="change" required
                                                                class="form-control" id="">    
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="userName"> Confirm Password<span class="required">*</span></label>
                                                        <input type="password" name="conf_password" parsley-trigger="change" required
                                                                class="form-control" id="">    
                                                    </div>
                                                    <button type="submit" class="btn btn-success"> Change password</button>
                                                </form>
                                                     </div>
                                                 </div>

                                            </div>
                                            </div>
                                            
                                </div>

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
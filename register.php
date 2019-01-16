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
     <style type="text/css">
        label{
           color: black; 
        }
        .required{
            color: red;
        }
    </style>

    <body >


       <?php
        include 'topnav.php';
       ?>
        <div class="wrapper">
            <div class="container">
                    
                 <div class="row">
                            <div class="col-sm-12 col-xs-12 col-md-12"> 
                                <div class="card-box">
                                    <h4 class="header-title m-t-0">Participant Registration</h4>
                                    <p class="text-muted font-13 m-b-10">
                                               Field with  asterike<span class="required">(*)</span> must be fill
                                            </p>
                                            <?php
                                                //echo $message;

                                                //$sql = mysqli_query($con, "select * from conference_tb");
                                            ?>

                                            <div class="p-20">
                                                <form action="" method="post" name="addemp">
                                                    
                                                    
                                                    
                                                    <div class="form-group">
                                                        <label for="passWord2">Email: <span class="required">*</span></label>
                                                        <input type="email" name="email" parsley-trigger="change" required
                                                                class="form-control" id="">
                                                        
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label for="userName">Username<span class="required">*</span></label>
                                                        <input type="text" name="username" parsley-trigger="change" required
                                                                class="form-control" id="">    
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="userName">password<span class="required">*</span></label>
                                                        <input type="password" name="password" id="password" parsley-trigger="change" required
                                                                class="form-control" id="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="userName">confrim Password<span class="required">*</span></label>
                                                        <input type="password" name="confirmpassword" parsley-trigger="change" required
                                                                class="form-control" id="">
                                                    </div>
                                                   <div class="form-group">
                                                        <label for="userName">Registration type<span class="required">*</span></label>
                                                        <select class="form-control" name="title" required>
                                                            <option value="">select Registration type</option>
                                                            <option>Author</option>
                                                            <option>Reviewer</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-group text-right m-b-0">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit" name="regsiter" onclick="return valid();">
                                                            Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-default waves-effect m-l-5">
                                                            Cancel
                                                        </button>
                                                    </div>

                                                </form>
                                            </div>
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
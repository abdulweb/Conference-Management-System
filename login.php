<?php
include 'connection.php';
session_start();

$msg = $message = " ";
if (isset($_POST['loginBtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username) || empty($password)) 
    {
        echo "<script>alert('Username or Password Field can not be empty')</script>";
    }
    else
    {
        if ($username =='admin@admin.com' and $password =='pass3word') {
            $_SESSION['user'] = $username;
            $_SESSION['usertype'] = 'admin';
            header('location:admin/index.php');
        }

        else{
            $query = mysqli_query($con, "select * from user_tb where email ='$username' and password = '$password'");
            if (mysqli_num_rows($query)>0) {
                $check = mysqli_fetch_assoc($query);
                $_SESSION['user'] = $username;
                $_SESSION['usertype'] = $check['usertype'];
                if ($_SESSION['usertype'] == 'author') {
                    header('location:author/profile.php');
                }
                elseif ($_SESSION['usertype'] =='reviewer') {
                     header('location:reviewer/profile.php');
                }
                elseif ($_SESSION['usertype'] == 'Participant') {
                     header('location:participant/index.php');
                }
                else{
                     $msg = ' Unauthorize User';
                    $message = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                        <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        <i class="mdi mdi-block-helper"></i>
                                                        <strong>OOPS! </strong>'.$msg.' 
                                                    </div>';
                }
               
            }
            else{
                 $msg = ' wrong username or password';
            $message = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <i class="mdi mdi-block-helper"></i>
                                                <strong>Oh snap!</strong>'.$msg.' 
                                            </div>';
            }
           
        }
    }
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
                	
	        	 <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="m-t-40 account-pages">
                                <div class="text-center account-logo-box">
                                    <h2 class="text-uppercase">
                                         <a href="#" class="text-white">
                                            <span>Login In</span>
                                        </a>
                                    </h2>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                <div class="account-content">
                                    <form class="form-horizontal" action="" method="post">
                                    <?php
                                        echo $message;
                                    ?>
                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <input class="form-control" name="username" type="email" required="" placeholder="Email Address">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                            </div>
                                        </div>

                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <div class="checkbox checkbox-success">
                                                    <input id="checkbox-signup" type="checkbox" checked>
                                                    <label for="checkbox-signup">
                                                        Remember me
                                                    </label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="form-group text-center m-t-30">
                                            <div class="col-sm-12">
                                                <a href="page-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                                            </div>
                                        </div>

                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" name="loginBtn" type="submit">Log In</button>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->


                            <div class="row m-t-50">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Don't have an account? <a href="register.php" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                                </div>
                            </div>

                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>

                
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
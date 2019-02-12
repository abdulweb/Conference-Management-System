<?php
    include 'connection.php';
    error_reporting(0);
    $msg = $message = '';
    if (isset($_POST['regsiter'])) {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
        $usertype = $_POST['usertype'];
        $date = date('Y-m-d');
        if (empty($email) || empty($usertype) || empty($username) || empty($password) || empty($confirmpassword)) {
            $msg = 'All field is required';
            $message = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>  <i class="mdi mdi-block-helper"></i> <strong>OOPS! </strong>'.$msg.'  </div>';
        }
        else{
            $check = mysqli_query($con, "SELECT * FROM user_tb where email = '$email'");
            if (mysqli_num_rows($check)>0) 
            {
                $msg = 'User Already Exist. Kindly login to register for conference';
            }
            else
            {
                $insert = mysqli_query($con, "INSERT INTO user_tb(email,username,password,usertype,date_create) VALUES('$email','$username','$password','$usertype','$date')") or mysqli_error($con);
                if ($insert) {
                    $msg = 'Registration Successfully';
                     $message = '<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>  <i class="mdi mdi-block-helper"></i> <strong>Congratulation!!! </strong>'.$msg.'  </div>';
                }
                else{
                    $msg = 'Error Occur Please Retry';
                    $message = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>  <i class="mdi mdi-block-helper"></i> <strong>OOPS! </strong>'.$msg.'  </div>';
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
     <style type="text/css">
        label{
           color: black; 
        }
        .required{
            color: red;
        }
    </style>
    <script type="text/javascript">
        function valid()
{
if(document.addemp.password.value!= document.addemp.confirmpassword.value)
{
alert(" Password and Confirm Password does not match  !!");
document.addemp.confirmpassword.focus();
return false;
}
var x = $('#password').val().length;
if(x< 8){
    alert("Passwords must be More than eight character.");
    return false;
}

}
    </script>

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
                                                echo $message;
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
                                                        <select class="form-control" name="usertype" required>
                                                            <option value="">select Registration type</option>
                                                             <option value="participant">Participant</option>
                                                            <option value="author">Author</option>
                                                            <option value="reviewer">Reviewer</option>
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
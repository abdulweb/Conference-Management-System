<?php
     include 'connection.php';
     include("phpmailer-master/class.phpmailer.php");
     include("phpmailer-master/class.smtp.php");
    error_reporting(0);
    session_start();
    $get_id = $_GET['id'];
    //fetch conference
    $select_query = mysqli_query($con, "select * from conference_tb where id ='$get_id'");
    $select_row = mysqli_fetch_assoc($select_query);
    $end_date = $select_row['conf_date'];
    $message = $msg ='';
    if (isset($_POST['regsiter'])) {
        //$fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $con_password =$_POST['confirmpassword'];
        
        $date_create = date('Y-m-d');
        $subject = $_SESSION['conf_name'];
        $Mssg = 'Application Successfully Kindly Login with Your Login Detail to update Your Profile. \n Username: '. $username." " .'Password: '.$password;
        if (empty($email) || empty($username) || empty($password) || empty($con_password)) {
            $msg = ' All field with asterik must be field';
            $message = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span>
                        </button><i class="mdi mdi-block-helper"></i> <strong>Oh snap!!</strong>'.$msg.' 
                       </div>';
        }
        else{
            // check if fee has been registerd
            $check = mysqli_query($con, "select * from user_tb where email = '$email'");
            if (mysqli_num_rows($check)>0) {
                $msg = ' Email Already Exist';
                $message = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span>
                        </button><i class="mdi mdi-block-helper"></i> <strong>Oh snap!!</strong>'.$msg.' 
                       </div>';
            }
            else{
                $check_conf = mysqli_query($con, "select * from conference_reg_tb where user_email ='$email'");
                if (mysqli_num_rows($check_conf)>0) {
                    $msg = ' You Have Registerd For this Conference';
                $message = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span>
                        </button><i class="mdi mdi-block-helper"></i> <strong>Oh snap!!</strong>'.$msg.' 
                       </div>';
                }
                else{
                    // $mail = new PHPMailer();

                    // $mail->IsSMTP();
                    // $mail->SMTPAuth   = true;                  // enable SMTP authentication
                    // $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
                    // $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
                    // $mail->Port       = 465; //or 587

                    // $mail->Username   = "binraheem01@gmail.com";  // GMAIL username
                    // $mail->Password   = "babatunde";            // GMAIL password
                    // $mail ->SetFrom('Onine Conference Management');

                    // $mail->From     = $email;
                    // $mail->FromName   = "no-reply";
                    // $mail->Subject    = $Subject;
                    // $mail->Body    = $Mssg; //Text Body
                    // $mail->WordWrap   = 50; // set word wrap
                    // $mail ->AddAddress($email);
                    // // $mail->AddAttachment('images/'.$Uname.'.pdf');
                    // if(!$mail->Send())
                    // {
                    //    echo "Message could not be sent. <p>";
                    //    echo "Mailer Error: " . $mail->ErrorInfo;
                    //    exit;
                    // }

                    
                    // else{

                    $insert = mysqli_query($con, "INSERT INTO user_tb(email,usertype,username,password,date_create)VALUES('$email','author','$username','$password','$date_create')") or die(mysqli_error($con));
                    if ($insert) {
                        $sql_query = mysqli_query($con, "INSERT INTO conference_reg_tb(conf_id,user_email,end_date)VALUES('$get_id','$email','$end_date')") or die(mysqli_error($con));
                        if ($sql_query) {
                            $msg = ' Registration Successfully. Kindly check your mail to print your conference detail';
                            $message = '<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert"> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <i class="mdi mdi-check"></i><strong>Congratulation!!</strong>'.$msg.' 
                                    </div>';

                        }
                        else{
                            $msg = ' Error Occured. Please Retry again';
                         $message = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                                    </div>';
                        }

                        }
                        else{
                            $msg = ' Error Occured. Please Retry again';
                         $message = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                                    </div>';
                        }
                        
                     //}
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
    <body>


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

                                                //$sql = mysqli_query($con, "select * from conference_tb");
                                            ?>

                                            <div class="p-20">
                                                <form action="" method="post" name="addemp">
                                                    
                                                    <!-- <div class="form-group">
                                                        <label for="userName">Title<span class="required">*</span></label>
                                                        <select class="form-control" name="title" required>
                                                            <option value="">select Title</option>
                                                            <option>Prof.</option>
                                                            <option>Dr.</option>
                                                            <option>Mr.</option>
                                                            <option>Mrs.</option>
                                                            <option>Miss.</option>
                                                        </select>
                                                        
                                                    </div> -->
                                                    <!-- <div class="form-group">
                                                        <label for="userName">Full Name<span class="required">*</span></label>
                                                        <input type="text" name="fullname" parsley-trigger="change" required
                                                                class="form-control" id="">
                                                            
                                                        
                                                    </div> -->
                                                    <div class="form-group">
                                                        <label for="passWord2">Email: <span class="required">*</span></label>
                                                        <input type="email" name="email" parsley-trigger="change" required
                                                                class="form-control" id="">
                                                        
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="passWord2">Phone Number : <span class="required">*</span></label>
                                                        <input type="number" name="phone" parsley-trigger="change" required
                                                                class="form-control" id="userName">
                                                        
                                                    </div> -->
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
                                                    <!-- <div class="form-group">
                                                        <label for="userName">Bio<span class="required">*</span></label>
                                                        <textarea class="form-control" name="bio" required></textarea>
                                                    </div> -->

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

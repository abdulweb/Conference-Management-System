<?php
include 'includes/connection.php';
include("..\phpmailer-master/class.phpmailer.php");
include("..\phpmailer-master/class.smtp.php");
session_start();
$message = $msg = "";
if (empty($_SESSION['user']) || $_SESSION['user'] == '' || $_SESSION['user'] == null) {
    header('location:../index.php');
}
if (empty($_GET['id'])) {
    header('location:author.php');
}
else{
    $id = $_GET['id'];
    $query = mysqli_query($con, "select * from upload_document where id = '$id'") or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($query);

    // $reviwe = mysqli_query($con, "select * from user_tb where usertype ='reviewer'");
    // $data_fetch = mysqli_fetch_assoc($reviwe);
}
//send email messsage
if(isset($_POST['add_attach'])) {
    $conf_id = $_POST['conf_id'];
    $auth_email = $_POST['auth_email'];
    $reviwe_email = $_POST['reviwe_email'];

    $Subject = 'Reviewer Attachment';
    $body = 'You have been marge to '." ".$email;
     $body2 = 'You have been marge to '." ".$reviwe_email;
    
    $inset_sql = mysqli_query($con, "UPDATE upload_document set reviewer ='$reviwe_email' where conf_id ='$conf_id' and email ='$auth_email'")or die (mysqli_error($con));
    sendmail($email,$Subject,$body2);
    sendmail($reviwe_email,$Subject,$body);
    if ($inset_sql) 
    {
         $msg = ' Author Merged Successfully';
         $message = '<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="mdi mdi-check"></i><strong> </strong>'.$msg.' 
                    </div>';
    }
    else
    {
        $msg = ' Error Occured. Please Retry again';
        $message = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <i class="mdi mdi-block-helper"></i><strong>OOPS!! </strong>'.$msg.' 
                </div>';
    }
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
        <title>Admin</title>

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

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
                                            <a href="author.php">Author </a>
                                        </li>
                                        <li>
                                            <a href="view_author.php">Available Author </a>
                                        </li>
                                        <li class="active">
                                             Author Attachment
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!--  breadcrum end row -->

                        <!-- start row of grid -->
                        <div class="row">
                            <div class="col-sm-12 col-xs-12 col-md-12"> 
                                <div class="card-box">
                                    <h4 class="header-title m-t-0">Attach Reviewer</h4>
                                    <p class="text-muted font-13 m-b-10">
                                               Field with  asterike<span class="required">(*)</span> must be fill
                                            </p>
                                            <?php
                                                echo $message;
                                                $new_conf_id = $data['conf_id'];
                                                $sql = mysqli_query($con, "select * from conference_tb where id ='$new_conf_id' ");
                                                $reviwe = mysqli_query($con, "select * from user_tb where usertype ='reviewer'");
                                                
                                            ?>

                                            <div class="p-20">
                                                <form action="" method="post">
                                                    
                                                    <div class="form-group">
                                                        <label for="passWord2">Author Email: <span class="required">*</span></label>
                                                        <input type="text" name="auth_email" value="<?=$data['email']?>"  class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="userName">Conference Title/Themes<span class="required">*</span></label>
                                                        <select class="form-control" name="conf_id" required>
                                                                <?php while ($row = mysqli_fetch_assoc($sql)) { ?>
                                                                <option value="<?=$row['id'] ?>"><?= $row['conf_title'] ?></option>
                                                            <?php } ?>
                                                            
                                                        </select>
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="passWord2">Reviewer : <span class="required">*</span></label>
                                                        <select class="form-control" name="reviwe_email" required>
                                                            <option value="">Select Reviewer</option>
                                                            
                                                                <?php while ($data_fetch = mysqli_fetch_assoc($reviwe)) {
                                                                    $gotmail = $data_fetch['email'];
                                                                    $checkmail = mysqli_query($con, "select * from user_profile where email = '$gotmail'");
                                                                    while ($fetch = mysqli_fetch_assoc($checkmail)) {
                                                                        ?>
                                                                      <option value="<?=$fetch['email'] ?>"><?= $fetch['fullname'] ?></option>
                                                                  
                                                                
                                                                
                                                            <?php }   }?>
                                                            
                                                        </select>
                                                    </div>
                                                    

                                                    <div class="form-group text-right m-b-0">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit" name="add_attach">
                                                            Submit
                                                        </button>
                                                        <a href="view_author.php">
                                                        Back
                                                        </a>
                                                    </div>

                                                </form>
                                            </div>
                                </div>    

                            </div>
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

<?php
function read(){
     echo "<script> alert('hey')<script>";
     $rebrand = $title.'.pdf';
   $route = ".\author/".$rebrand;
  // echo "<script>alert('$route')</script>";
  
  
  header('Content-Type: application/pdf');
  header('Content-Disposition: inline; filename="'.basename($route).'"');
  header('Content-Lenght: '. filesize($route));
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  ob_clean();
  flush();
  readfile($route);
}

function sendmail($email,$Subject,$body){
//    include("..\phpmailer-master/class.phpmailer.php");
// include("..\phpmailer-master/class.smtp.php");
            $mail = new PHPMailer();

            $mail->IsSMTP();
            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
            $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
            $mail->Port       = 465; //or 587

            $mail->Username   = "binraheem01@gmail.com";  // GMAIL username
            $mail->Password   = "babatunde";            // GMAIL password
            $mail ->SetFrom('Onine Conference Management');

            $mail->From     = 'no-reply';
            $mail->FromName   = "no-reply";
            $mail->Subject    = $Subject;
            $mail->Body    =  $body; //Text Body
            $mail->WordWrap   = 50; // set word wrap
            $mail ->AddAddress($email);
            // $mail->AddAttachment('images/'.$Uname.'.pdf');
            if(!$mail->Send())
            {
               echo "Message could not be sent. <p>";
               echo "Mailer Error: " . $mail->ErrorInfo;
               exit;
            }
}

?>
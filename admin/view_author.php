<?php
include 'includes/connection.php';
include("..\phpmailer-master/class.phpmailer.php");
include("..\phpmailer-master/class.smtp.php");
session_start();
$message = $msg = ""; $_SESSION['message_verify'] = "";
if (empty($_SESSION['user']) || $_SESSION['user'] == '' || $_SESSION['user'] == null) {
    header('location:../index.php');
}
if (empty($_GET['id'])) {
    header('location:author.php');
}
else{
    $email = $_GET['id'];
    $query = mysqli_query($con, "select * from user_profile where email = '$email'") or die(mysqli_error($con));
    $data = mysqli_fetch_assoc($query);

    $sql = mysqli_query($con, "select * from upload_document where email ='$email'");
    $data_fetch = mysqli_fetch_assoc($sql);
    $conf_id = $data_fetch['conf_id'];

    $sql_query = mysqli_query($con,"select * from conference_tb where id = '$conf_id' ") or die(mysqli_error($con));
    $fetchx = mysqli_fetch_assoc($sql_query);
}
if(isset($_POST['read'])){
  $title = $_POST['title'];
  //echo($title);
  // //$rebrand = $title.'.pdf';
  $route = ".\author/".$title;
  // // echo "<script>alert('$route')</script>";
  
  
  header('Content-Type: application/pdf');
  header('Content-Disposition: inline; filename="'.basename($route).'"');
  header('Content-Lenght: '. filesize($route));
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  ob_clean();
  flush();
  readfile($route);

}
if(isset($_POST['rejectBtn'])) {
    $reject = $_POST['reject'];
     $status = 'Rejected';
    $Subject = 'Paper Review Status';
    $body = 'Sorry Your Paper Have been '." ". $status ." " .'Due to Some Reason.  Kindly contact Us to know more';
    
    $reject_sql = mysqli_query($con, "UPDATE upload_document set status ='2' where id = '$reject' and email ='$email'")or die (mysqli_error($con));
    sendmail($status,$email,$Subject,$body);
    if ($reject) 
    {
         $msg = ' Paper Rejected Successfully';
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

if(isset($_POST['approveBtn'])) {
    $approve = $_POST['approve'];
    $status = 'Approved';
    $Subject = 'Paper Review Status';
    $body = 'Congratulation Your Paper Have been '." ". $status;
    //send notification to author

    $approve_sql = mysqli_query($con, "UPDATE upload_document set status ='1' where id = '$approve' and email ='$email'") or die (mysqli_error($con));
    sendmail($status,$email,$Subject,$body);
    if ($approve_sql) 
    {
         $msg = ' Paper Approved Successfully';
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
                                        <li class="active">
                                            View Author
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!--  breadcrum end row -->

                        <!-- start row of grid -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <?php echo $message; ?>
                                    <?php echo $_SESSION['message_verify']; ?>
                                    <?php
                                        $email = $_GET['id'];
                                        $query = mysqli_query($con, "select * from user_profile where email = '$email'") or die(mysqli_error($con));
                                        while ($data = mysqli_fetch_assoc($query)) {
                                            $sql = mysqli_query($con, "select * from upload_document where email ='$email'");
                                            while ($data_fetch = mysqli_fetch_assoc($sql)) {
                                                $conf_id = $data_fetch['conf_id'];

                                                $sql_query = mysqli_query($con,"select * from conference_tb where id = '$conf_id' ") or die(mysqli_error($con));
                                                while ($fetchx = mysqli_fetch_assoc($sql_query)) {
                                                    $payment_sql = mysqli_query($con, "select * from conference_reg_tb where conf_id = '$conf_id'") or die(mysqli_error($con));
                                                     $payment_fetch = mysqli_fetch_assoc($payment_sql);
                                                    
                                                    
                                    ?>
                                    <br>
                                    <h3>Author Paper Details</h3>
                                   <a href="attach.php?id=<?php echo htmlentities($data_fetch['id']);?>"> <button class="btn btn-info" style="float: right; margin-bottom:18px; margin-right: 10px;">Attach Reviewer</button> </a>
                                   <!-- verify button -->
                                     <a href="verifypayment.php?getid=<?php echo htmlentities($data_fetch['id']);?>"> <button class="btn btn-success" style="float: right; margin-bottom:18px; margin-right: 10px;"><i class="mdi mdi-check"> </i>Verify Payment</button> </a>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Author Name</th>
                                            <td><?=$data['fullname']?></td>
                                        </tr>
                                        <tr>
                                            <th>Author Email</th>
                                            <td><?=$email?></td>
                                        </tr>
                                        <tr>
                                            <th>Abouth Author</th>
                                            <td><?=$data['bio']?></td>
                                        </tr>
                                        <tr>
                                            <th>About Paper</th>
                                            <td><?=$data_fetch['about']?></td>
                                        </tr>
                                        <tr>
                                            <th>Conference Title</th>
                                            <td><?=$fetchx['conf_title']?></td>
                                        </tr>
                                        <tr>
                                            <th>Reviewer Attach</th>
                                            <td><?=$data_fetch['reviewer']?></td>
                                        </tr>
                                        <tr>
                                            <th>Payment Status</th>
                                            <td>
                                            <?php
                                                if ($payment_fetch['payment_status'] == 1) {
                                                    echo '<span class="label label-success">Success</span>';
                                                }
                                                // if ($row['payment_status'] == null) {
                                                    
                                                // }
                                                else
                                                    echo '<span class="label label-danger">Pending</span>';
                                            ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Paper Upload</th>
                                            <td>
                                               <!--  <form method="post" action="">
                                                <input type="hidden" name="title"  value="<?php echo $data_fetch['document']?>"  />
                                                <button  class="btn btn-success" type="submit" name="read" ><i class="fa fa-book"> </i> Read</button>
                                                </form> -->
                                                <form action="read_document.php" method="get">
                                                    <input type="hidden" name="get_read" value="<?=$data_fetch['id']?>">
                                                    <button class="btn btn-warning  btn-xs" type="submit" >VIEW</button>  
                                                </form>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Paper Status</th>
                                            <td>
                                                <?php
                                                    if (empty($data_fetch['status'])) {
                                                        echo '<button class ="btn btn-warning">Pending</button>';
                                                    }
                                                    elseif ($data_fetch['status'] ==1) {
                                                       echo '<button class="btn btn-success">Approve</button>';
                                                    }
                                                    else{
                                                      echo '<button class="btn btn-danger">Reject</button>';  
                                                    }
                                                        
                                                ?>
                                            </td>
                                        </tr>
                                    </table>
                                    <form method="post" action="">
                                        <input type="hidden" name="reject" value="<?php echo $data_fetch['id']?>" />
                                        <button type="submit" name="rejectBtn" onclick="return confirm('Are You sure You want to to reject')" class="btn btn-danger" style="float: right; margin-right: 8px;">Reject Paper</button>
                                    </form>
                                    <form method="post" action="">
                                        <input type="hidden" name="approve" value="<?php echo $data_fetch['id']?>" />
                                      <button type="submit" name="approveBtn" onclick="return confirm('Are You sure You want to to Approve')" class="btn btn-success" style="float: right;margin-right: 8px;">Approve Paper</button>
                                    </form> <br><br><hr>
                                    
                                    <?php
                                    // }
                                        }
                                            }
                                        }
                                    ?>
                                        
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

function sendmail($status,$mail,$Subject,$body){
   include("..\phpmailer-master/class.phpmailer.php");
include("..\phpmailer-master/class.smtp.php");
            $mail = new PHPMailer();

            $mail->IsSMTP();
            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
            $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
            $mail->Port       = 465; //or 587

            $mail->Username   = "binraheem01@gmail.com";  // GMAIL username
            $mail->Password   = "babatunde";            // GMAIL password
            $mail ->SetFrom('Onine Conference Management');

            $mail->From     = $mail;
            $mail->FromName   = "no-reply";
            $mail->Subject    = $Subject;
            $mail->Body    =  $body; //Text Body
            $mail->WordWrap   = 50; // set word wrap
            $mail ->AddAddress($mail);
            // $mail->AddAttachment('images/'.$Uname.'.pdf');
            if(!$mail->Send())
            {
               echo "Message could not be sent. <p>";
               echo "Mailer Error: " . $mail->ErrorInfo;
               exit;
            }
}

?>
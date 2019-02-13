<?php
include '..\admin/includes/connection.php';
session_start();
$message = $msg ='';
if (empty($_SESSION['user']) || $_SESSION['user'] == '' || $_SESSION['user'] == null) {
    header('location:../index.php');
}

$get_email = $_SESSION['user'];
$get_cof = mysqli_query($con, "select * from conference_reg_tb where user_email = '$get_email'");
// $fetch_conf = mysqli_fetch_assoc($get_cof);
// $conf_id = $fetch_conf['conf_id'];

if (isset($_POST['upload'])) {
    $about = $_POST['about'];
    $conf_id = $_POST['title'];
    if (empty($about)) {
        $msg = ' All field with asterik must be field';
         $message = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span>
                    </button><i class="mdi mdi-block-helper"></i> <strong>Oh snap!!</strong>'.$msg.' 
                   </div>';
    }
    else{
                    $target_dir = "..\admin/uploads/ViewerJS/";
                    $target_file = $target_dir . basename($_FILES["file"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    if ($_FILES["file"]["size"] > 25000000) 
                          {
                              $msg = "Sorry, your file is too large. Must not be more than 25MB";
                              $message =   '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                                        </div>';
                              $uploadOk = 0;
                          }
                          // Allow certain file formats
                          if($imageFileType != "pdf" ) 
                          {
                              $msg =  " Sorry, only pdf format is allowed.";
                              $message =   '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                                        </div>';
                              $uploadOk = 0;
                          }
                          // if ($uploadOk == 0) 
                          // {
                          //     $msg =  "Sorry, your file was not uploaded. Please retry";
                          //     $message =   '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                          //               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          //               <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                          //               </div>';

                          // // if everything is ok, try to upload file
                          // } 
                          else {
                            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) 
                            {
                                // insert into database
                               $insert = mysqli_query($con, "INSERT into upload_document(email,conf_id,document,about) values('$get_email','$conf_id','$target_file','$about')") or die(mysqli_error($con));
                                if ($insert) {
                                                    // $mail = new PHPMailer();

                                  $mail->IsSMTP();
                                  $mail->SMTPAuth   = true;                  // enable SMTP authentication
                                  $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
                                  $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
                                  $mail->Port       = 465; //or 587

                                  $mail->Username   = "abdulrasheeda9@gmail.com";  // GMAIL username
                                  $mail->Password   = "b08060415146";            // GMAIL password
                                  $mail ->SetFrom('SSU JOB UPDATE');

                                  $mail->From     = "no-reply.com";
                                  $mail->FromName   = "no-reply";
                                  $mail->Subject    = $Subject;
                                  $mail->Body    = "Your Paper have been uploaded Successfully. Kindly wait for a reviewer attachment "; //Text Body
                                  $mail->WordWrap   = 50; // set word wrap
                                  $mail ->AddAddress($get_email);
                                  // $mail->AddAttachment('images/'.$Uname.'.pdf');
                                  if(!$mail->Send())
                                  {
                                     echo "Message could not be sent. <p>";
                                     echo "Mailer Error: " . $mail->ErrorInfo;
                                     exit;
                                  }
                                  else{
                                       $msg = ' Document uploaded Successfully';
                                       $message = '<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert"> 
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <i class="mdi mdi-check"></i><strong>Congratulation!!</strong>'.$msg.' 
                                                </div>';
                                      }
                                }
                                else{
                                    $msg = ' Error Occured. Please Retry';
                                 $message = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                                            </div>';
                                }

                                } else {
                                    $msg =  "Sorry, there was an error uploading your file.";
                                    $message =   '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                                            </div>';
                                }
                            }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include 'headlink.php';
        ?>

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
                include '..\admin/includes/topbar.php';
                include '..\admin/includes/sidebar.php';
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
                                    <h4 class="page-title">Document Upload </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="index.php">Dashoard</a>
                                        </li>
                                        
                                        <li class="active">
                                            Upload Paper
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
                                    <h4 class="header-title m-t-0">Upload Paper</h4>
                                    <p class="text-danger font-13 m-b-10">
                                               Document allow is .pdf format only
                                            </p>
                                            <?php
                                                echo $message;

                                                
                                                // $row = mysqli_fetch_assoc($sql);
                                                // $conf_title = $row['conf_title'];
                                            ?>

                                            <div class="p-20">
                                                <form action="upload.php" method="post" enctype="multipart/form-data">
                                                    
                                                    <div class="form-group">
                                                        <label for="userName">Conference Title/Themes</label>
                                                        <select class="form-control" name="title" required>
                                                        <option value="">Select Conference</option>
                                                        <?php
                                                          while ($fetch_conf = mysqli_fetch_assoc($get_cof)) {
                                                            $conf_id_get = $fetch_conf['conf_id'];
                                                             $sql = mysqli_query($con, "select * from conference_tb where id ='$conf_id_get'");
                                                             while ($rows = mysqli_fetch_assoc($sql)) {
                                                                $conf_title = $rows['conf_title'];
                                                                $real_id = $rows['id'];
                                                            
                                                            ?>
                                                            <option value="<?=$rows['id']?>"> <?=$rows['conf_title']?></option>
                                                          <?php
                                                        } 
                                                      }
                                                        ?>
                                                        </select>

                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="userName">About the Paper <span class="required">*</span></label>
                                                        <textarea class="form-control" name="about" required></textarea>
                                                        
                                                    </div>
                                                    <div class="form-group m-b-30">
                                                        <label class="control-label">Select File </label>
                                                        <input type="file" class="filestyle" name="file" data-buttonname="btn-primary" required>
                                                    </div>

                                                    <div class="form-group text-right m-b-0">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit" name="upload"> <i class="fa fa-upload"> </i> 
                                                            Upload
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
                        <!-- end row of grid -->



                    </div> <!-- container -->

                </div> <!-- content -->

               <!-- footer section start-->
               <?php
                include '..\admin/includes/footer.php';
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

        <?php
        include 'js.php';
        ?>
    </body>
</html>
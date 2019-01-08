<?php
include 'includes/connection.php';
session_start();
$message = $msg ='';
if (empty($_SESSION['user']) || $_SESSION['user'] == '' || $_SESSION['user'] == null) 
{
    header('location:../index.php');
}
if (isset($_POST['add_conf'])) {
    $conf_name = ucwords($_POST['conf_name']);
    $conf_desc = ucwords($_POST['conf_desc']);
    $conf_date = $_POST['conf_date'];
    $conf_time = $_POST['conf_time'];
    $conf_venue = ucwords($_POST['conf_venue']);
    // $conf_fee = $_POST['conf_fee'];

    // check if any is empty
    if (empty($conf_name)|| empty($conf_desc) || empty($conf_date) || empty($conf_time) || empty($conf_venue)) {
       $msg = ' All field with asterik must be field';
       $message = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <i class="mdi mdi-block-helper"></i>
                                                <strong>Oh snap!!</strong>'.$msg.' 
                                            </div>';
    }
    else{
        //check if conference exit before
        $sql = mysqli_query($con, "select * from conference_tb where conf_title = '$conf_name'");
        if (mysqli_num_rows($sql)>0) {
             $msg = ' Conference Already Exist';
             $message = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <i class="mdi mdi-block-helper"></i><strong>Oh shit!!</strong>'.$msg.' 
                        </div>';
        }
        else{
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["conf_image"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                // Check if image file is a actual image or fake image
                    $check = getimagesize($_FILES["conf_image"]["tmp_name"]);
                    if($check !== false) {
                        //echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        $msg = "File is not an image. Please select Image file";
                        $message =   '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <i class="mdi mdi-block-helper"></i><strong>Oh shit!!</strong>'.$msg.' 
                                        </div>';
                        $uploadOk = 0;
                    }
                     // Check if file already exists
        if (file_exists($target_file)) {
            // insert into database
            $insert = mysqli_query($con, "INSERT into conference_tb(conf_title,conf_desc,conf_date,conf_time,conf_venue,conf_image) values('$conf_name','$conf_desc','$conf_date','$conf_time','$conf_venue','$target_file')") or die(mysqli_error($con));
            if ($insert) {
               $msg = ' Conference Created Successfully';
             $message = '<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert"> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <i class="mdi mdi-check"></i><strong>Congratulation!!</strong>'.$msg.' 
                        </div>';
            }
            else{
                $msg = ' Error Occure. Please Retry';
             $message = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                        </div>';
            }

        }
        else
        {


          // Check file size
          if ($_FILES["conf_image"]["size"] > 5000000) 
          {
              $msg = "Sorry, your file is too large. Must not be more than 5MB";
              $message =   '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                        </div>';
              $uploadOk = 0;
          }
          // Allow certain file formats
          if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) 
          {
              $msg =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
              $message =   '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                        </div>';
              $uploadOk = 0;
          }
        // Check if $uploadOk is set to 0 by an error
          if ($uploadOk == 0) 
          {
              $msg =  "Sorry, your file was not uploaded. Please retry";
              $message =   '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                        </div>';

          // if everything is ok, try to upload file
          } 
          else {
            if (move_uploaded_file($_FILES["conf_image"]["tmp_name"], $target_file)) 
            {
                // insert into database
               $insert = mysqli_query($con, "INSERT into conference_tb(conf_title,conf_desc,conf_date,conf_time,conf_venue,conf_image) values('$conf_name','$conf_desc','$conf_date','$conf_time','$conf_venue','$target_file')") or die(mysqli_error($con));
                if ($insert) {
                   $msg = ' Conference Created Successfully';
                 $message = '<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert"> 
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <i class="mdi mdi-check"></i><strong>Congratulation!!</strong>'.$msg.' 
                            </div>';
                }
                else{
                    $msg = ' Error Occure. Please Retry';
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

       <!-- Plugins Css -->
        <link href="../plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href="../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
        <link href="../plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
        <link href="../plugins/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
        <link href="../plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

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
                                    <h4 class="page-title">Add Conference </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="index.php">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            Create Conference
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!--  breadcrum end row -->

                        <!-- start row  -->
                        
                        <div class="row">
                            <div class="col-sm-12 col-xs-12 col-md-12"> 
                                <div class="card-box">
                                    <h4 class="header-title m-t-0">New conference</h4>
                                    <p class="text-muted font-13 m-b-10">
                                               Field with  asterike<span class="required">(*)</span> must be fill
                                            </p>
                                            <?php
                                                echo $message;
                                            ?>

                                            <div class="p-20">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="userName">Conference Title/Themes<span class="required">*</span></label>
                                                        <input type="text" name="conf_name" parsley-trigger="change" required
                                                                class="form-control" id="userName">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="emailAddress">Conference Description<span class="required">*</span></label>
                                                        <textarea required class="form-control" name="conf_desc"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pass1">Conference Date<span class="required">*</span></label>
                                                        <div>
                                                            <div class="input-group">
                                                                <input type="text" name="conf_date" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" required>
                                                                <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                                            </div><!-- input-group -->
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="passWord2">Conference Time <span class="required">*</span></label>
                                                        <div class="input-group">
                                                            <input id="timepicker" name="conf_time" type="text" class="form-control" required>
                                                            <span class="input-group-addon"><i class="mdi mdi-clock"></i></span>
                                                        </div><!-- input-group -->
                                                        
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="passWord2">Conference Venue <span class="required">*</span></label>
                                                         <input type="text" name="conf_venue" parsley-trigger="change" required
                                                                class="form-control" id="userName">
                                                    </div>
                                                     <!-- <div class="form-group">
                                                        <label for="passWord2">Conference Fee <span class="required">*</span></label>
                                                        <input type="text" name="conf_fee" data-a-sign="# " class="form-control autonumber" required>
                                                                <span class="font-13 text-muted">e.g. "# $ 1,234,567,890,123"</span>
                                                        
                                                    </div> -->

                                                    <div class="form-group">
                                                        <label for="passWord2">Conference Image <span class="required">*</span></label>
                                                        <input type="file" name="conf_image" data-a-sign="# " class="form-control" required>
                                                                
                                                        
                                                    </div>

                                                    <div class="form-group text-right m-b-0">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit" name="add_conf">
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
                        <!-- end row -->



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
        <script src="../plugins/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script src="../plugins/autoNumeric/autoNumeric.js"></script>
        
        <!-- picker -->
        <script src="../plugins/moment/moment.js"></script>
        <script src="../plugins/timepicker/bootstrap-timepicker.js"></script>
        <script src="../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script src="../plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
        <script src="../plugins/clockpicker/js/bootstrap-clockpicker.min.js"></script>
        <script src="../plugins/bootstrap-daterangepicker/daterangepicker.js"></script>


        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <script src="assets/pages/jquery.form-pickers.init.js"></script>
         <script>

          jQuery(function($) {
              $('.autonumber').autoNumeric('init');
          });
        </script>

    </body>
</html>
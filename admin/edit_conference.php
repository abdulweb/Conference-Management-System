<?php
include 'includes/connection.php';
session_start();
$message = $msg ='';
if (empty($_SESSION['user']) || $_SESSION['user'] == '' || $_SESSION['user'] == null) 
{
    header('location:../index.php');
}
$get_id = $_GET['id'];
if (empty($get_id) || $get_id ==null) {
       header('location:createConference.php');
}
$getconf = mysqli_query($con, "SELECT * FROM conference_tb where id = '$get_id'") or die(mysqli_error($con));

if (isset($_POST['update'])) {
    $conf_name = ucwords($_POST['conf_name']);
    $conf_desc = ucwords($_POST['conf_desc']);
    $conf_date = $_POST['conf_date'];
    $conf_time = $_POST['conf_time'];
    $conf_venue = ucwords($_POST['conf_venue']);
    $conf_end_date = $_POST['conf_end_date'];

    // check if any is empty
    if (empty($conf_name)|| empty($conf_desc) || empty($conf_date) || empty($conf_time) || empty($conf_venue) || empty($conf_end_date)) {
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
        $startdate = substr($conf_date,6);
        $enddate = substr($conf_end_date,6);
        if (($startdate> $enddate) || $enddate < date('m/d/Y')) {
            $msg = ' Wrong Date Format';
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
            $update_conf = mysqli_query($con, "UPDATE conference_tb set conf_title ='$conf_name', conf_desc = '$conf_desc', conf_date ='$conf_date', conf_venue = '$conf_venue',conf_time ='$conf_time', conf_end_date = '$conf_end_date' where id = '$get_id'") or die(mysqli_error($con));
            if ($update_conf) {
                 $msg = ' Record Update Successfully';
                $_SESSION['message'] = '<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert"> 
                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <i class="mdi mdi-block-helper"></i>
                                                <strong>Congratulation!!</strong>'.$msg.' 
                                            </div>';
                                    header('location:manageConference.php');
            }
            else{
                 $msg = ' Error Occure Please Retry ';
                $_SESSION['message'] = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <i class="mdi mdi-block-helper"></i>
                                                <strong>Oh snap!!</strong>'.$msg.' 
                                            </div>';
                                            header('location:manageConference.php');
            }
        }
        
    }
}

// update conference image
if (isset($_POST['image_update'])) {
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
                               $insert = mysqli_query($con, "UPDATE conference_tb set conf_image ='$target_file' where id = '$get_id'") or die(mysqli_error($con));
                            if ($insert) {
                               $msg = ' Conference Created Successfully';
                                 $_SESSION['message'] = '<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert"> 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <i class="mdi mdi-check"></i><strong>Congratulation!!</strong>'.$msg.' 
                                        </div>';
                                        header('location:manageConference.php');
                            }
                            else
                            {
                                $msg = ' Error Occure. Please Retry';
                                 $message = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                                        </div>';
                            }

                            } 
                            else 
                            {
                                $msg =  "Sorry, there was an error uploading your file.";
                                $message =   '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                                        </div>';
                            }
}
}

// Get ID


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

     <script type="text/javascript">
    function valid()
    {
    if(document.addemp.conf_date.value > document.addemp.conf_end_date.value)
    {
    alert(" End Date must be greater than Start Date !!");
    document.addemp.conf_end_date.focus();
    document.addemp.conf_end_date.style.borderColor = "red";
    return false;
    }
    var end = $('#conf_end').val().length;
    var start = $('#datepicker-autoclose').val().length;

    if(end < start){
        alert("Wrong End Date format Use the start date format.");
        document.addemp.conf_end_date.focus();
        document.addemp.conf_end_date.style.borderColor = "black";
        document.addemp.conf_end_date.style.borderColor = "red";
        return false;

    }

    }
    </script>

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
                                            <a href="manageConference.php">Conference</a>
                                        </li>
                                        <li class="active">
                                            Edit Conference
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!--  breadcrum end row -->

                        <!-- start row  -->
                        
                        <div class="row">
                            <div class="col-sm-9 col-xs-9 col-md-9"> 
                                <div class="card-box">
                                    <h4 class="header-title m-t-0">New conference</h4>
                                    <p class="text-muted font-13 m-b-10">
                                               Field with  asterike<span class="required">(*)</span> must be fill
                                            </p>
                                            <?php
                                                echo $message;
                                            ?>

                                            <div class="p-20">
                                                <?php
                                                    while ($rows = mysqli_fetch_assoc($getconf)) {
                                                   
                                                 ?>
                                                <form action="" method="post" name="addemp" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <label for="userName">Conference Title/Themes<span class="required">*</span></label>
                                                        <input type="text" name="conf_name" parsley-trigger="change" required
                                                                class="form-control" id="userName" value="<?=$rows['conf_title']?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="emailAddress">Conference Description<span class="required">*</span></label>
                                                        <textarea required class="form-control" name="conf_desc"><?=$rows['conf_desc']?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="pass1">Conference Start Date<span class="required">*</span></label>
                                                        <div>
                                                            <div class="input-group">
                                                                <input type="text" name="conf_date" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" required value="<?=$rows['conf_date']?>">
                                                                <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                                            </div><!-- input-group -->
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="pass1">Conference End Date<span class="required">*</span></label>
                                                        <div>
                                                            <div class="input-group">
                                                                <input type="text" name="conf_end_date" class="form-control" placeholder="mm/dd/yyyy" id="conf_end" required value="<?=$rows['conf_end_date']?>">
                                                                <span class="input-group-addon bg-custom b-0"><i class="mdi mdi-calendar text-white"></i></span>
                                                            </div><!-- input-group -->
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="passWord2">Conference Time <span class="required">*</span></label>
                                                        <div class="input-group">
                                                            <input id="timepicker" name="conf_time" type="text" class="form-control" value="<?=$rows['conf_time']?>" required>
                                                            <span class="input-group-addon"><i class="mdi mdi-clock"></i></span>
                                                        </div><!-- input-group -->
                                                        
                                                    </div>
                                                     <div class="form-group">
                                                        <label for="passWord2">Conference Venue <span class="required">*</span></label>
                                                         <input type="text" name="conf_venue" parsley-trigger="change" required
                                                                class="form-control" id="userName" value="<?=$rows['conf_venue']?>">
                                                    </div>

                                                    <div class="form-group text-right m-b-0">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit" name="update" onclick="return valid()">
                                                            update conference
                                                        </button>
                                                        <button type="reset" class="btn btn-default waves-effect m-l-5">
                                                            Cancel
                                                        </button>
                                                    </div>

                                                </form>
                                               
                                            </div>
                                </div>    

                            </div>
                            <div class="col-md-3">
                            <form>
                                <img src="<?=$rows['conf_image']?>" class="img img-thumbnail">
                                <input type="hidden" name="image_id" value="<?=$rows['id']?>">
                                <button class="btn btn-primary btn-block m-t-15" data-toggle="modal" data-target="#con-close-modal" type="button">Change Image</button>
                            </form>
                            </div>
                             <?php } ?>
                        </div>
                        <!-- end row -->



                    </div> <!-- container -->

                </div> <!-- content -->

                <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" class="">Personal Info</h4>
                                        </div>
                                        <form method="post" action="" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="field-1" class="control-label"> Conference Image :</label>
                                                        <input type="file" name="conf_image">
                                                    </div>
                                                </div>
                                             </div>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" name="image_update" class="btn btn-success">Update Image</button>
                                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div><!-- /.modal -->

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
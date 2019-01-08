<?php
include 'includes/connection.php';

session_start();
$message = $msg ='';
if (empty($_SESSION['user']) || $_SESSION['user'] == '' || $_SESSION['user'] == null) {
    header('location:../index.php');
}
if (isset($_POST['add_fee'])) { 
    $conf_id = $_POST['conf_title'];
    $part_fee = $_POST['part_fee'];
    $author_fee = $_POST['author_fee'];
    if (empty($conf_id) || empty($part_fee)|| empty($author_fee)) {
         $msg = ' All field with asterik must be field';
         $message = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span>
                    </button><i class="mdi mdi-block-helper"></i> <strong>Oh snap!!</strong>'.$msg.' 
                   </div>';
    }
    else{
        // check if fee has been registerd
        $check = mysqli_query($con, "select * from fee_tb where conf_id = '$conf_id'");
        if (mysqli_num_rows($check)>0) {
            $msg = ' Conference Fee Has ben Schedule Before';
       $message = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span>
                    </button><i class="mdi mdi-block-helper"></i> <strong>Oh snap!!</strong>'.$msg.' 
                   </div>';
        }
        else{
            $insert = mysqli_query($con, "INSERT INTO fee_tb(conf_id,user,author)VALUES('$conf_id','$part_fee','$author_fee')") or die(mysqli_error($con));
            if ($insert) {
                   $msg = ' Conference Free Added Successfully';
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
                                    <h4 class="page-title">Dashboard </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        
                                       <li>
                                            <a href="index.php">Dashboard</a>
                                        </li>
                                        <li class="active">
                                            Add Fee
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
                                    <h4 class="header-title m-t-0">Add Fees</h4>
                                    <p class="text-muted font-13 m-b-10">
                                               Field with  asterike<span class="required">(*)</span> must be fill
                                            </p>
                                            <?php
                                                echo $message;

                                                $sql = mysqli_query($con, "select * from conference_tb");
                                            ?>

                                            <div class="p-20">
                                                <form action="add_fee.php" method="post">
                                                    
                                                    <div class="form-group">
                                                        <label for="userName">Conference Title/Themes<span class="required">*</span></label>
                                                        <select class="form-control" name="conf_title" required>
                                                            <option value="">Select Conference Tittle</option>
                                                            
                                                                <?php while ($row = mysqli_fetch_assoc($sql)) { ?>
                                                                <option value="<?=$row['id'] ?>"><?= $row['conf_title'] ?></option>
                                                            <?php } ?>
                                                            
                                                        </select>
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="passWord2">Participant Fee: <span class="required">*</span></label>
                                                        <input type="text" name="part_fee" data-a-sign="# " class="form-control autonumber" required>
                                                                <span class="font-13 text-muted">e.g. "# $ 1,234,567,890,123"</span>
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="passWord2">Author Fee: <span class="required">*</span></label>
                                                        <input type="text" name="author_fee" data-a-sign="# " class="form-control autonumber" required>
                                                                <span class="font-13 text-muted">e.g. "# $ 1,234,567,890,123"</span>
                                                        
                                                    </div>

                                                    <div class="form-group text-right m-b-0">
                                                        <button class="btn btn-primary waves-effect waves-light" type="submit" name="add_fee">
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
        <script src="../plugins/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script src="../plugins/autoNumeric/autoNumeric.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <script>

          jQuery(function($) {
              $('.autonumber').autoNumeric('init');
          });
        </script>

    </body>
</html>
<?php

session_start();
include '..\admin/includes/connection.php';
if (empty($_SESSION['user']) || $_SESSION['user'] == '' || $_SESSION['user'] == null) {
    header('location:../index.php');
}
$user_email = $_SESSION['user'];
$name = $phone =$boi =$message=$msg= $specx = $socx ="";
if (isset($_POST['add_profile'])) {
    $title = $_POST['title'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $bio = $_POST['bio'];
    $spec = $_POST['spec'];
    $soc = $_POST['soc'];
    if (empty($title) || empty($fullname) || empty($phone) || empty($bio) || empty($spec) ) {
        $msg = ' All field with asterik must be field';
         $message = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span>
                    </button><i class="mdi mdi-block-helper"></i> <strong>Oh snap!!</strong>'.$msg.' 
                   </div>';
    }
    else{
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["passport"]["name"]);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $numrow = mysqli_num_rows(mysqli_query($con,"select * from user_profile where email  ='$user_email'"));
            if ($numrow >0) 
            {
                // Check if image file is a actual image or fake image
                    $check = getimagesize($_FILES["passport"]["tmp_name"]);
                    if($check !== false) {
                        //echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } 
                    else {
                        $msg = "File is not an image. Please select Image file";
                        $message =   '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <i class="mdi mdi-block-helper"></i><strong>Oh shit!!</strong>'.$msg.' 
                                        </div>';
                        $uploadOk = 0;
                    }
                    if (file_exists($target_file) ) 
                    {
                        // update into database
                        $insert = mysqli_query($con, "UPDATE user_profile set email = '$user_email',title = '$title',fullname = '$fullname',phone = '$phone',bio='$bio',field ='$spec',social_name ='$soc',passport = '$target_file' where email='$user_email'") or die(mysqli_error($con));
                        if ($insert) {
                           $msg = ' Profile Updated Successfully';
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
                    //
                    else
                    {
                            if ($_FILES["passport"]["size"] > 5000000) 
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
                          else 
                          {
                            if (move_uploaded_file($_FILES["passport"]["tmp_name"], $target_file)) 
                            {
                                // insert into database
                               $insert = mysqli_query($con, "UPDATE user_profile set email = '$user_email',title = '$title',fullname = '$fullname',phone = '$phone',bio='$bio',field ='$spec',social_name ='$soc',passport = '$target_file' where email='$user_email'") or die(mysqli_error($con));
                                if ($insert) {
                                   $msg = ' Profile Updated Successfully';
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
                                    $msg =  "Sorry, there was an error uploading your file.";
                                    $message =   '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                                            </div>';
                                 }
                    }
                }
            }

            else
             {


              // Check file size
                  if ($_FILES["passport"]["size"] > 5000000) 
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
                    if (move_uploaded_file($_FILES["passport"]["tmp_name"], $target_file)) 
                    {
                        // insert into database
                       $insert = mysqli_query($con, "INSERT into user_profile(email,title,fullname,phone,bio,passport,field,social_name) values('$user_email','$title','$fullname','$phone','$bio','$target_file','$spec','$soc')") or die(mysqli_error($con));
                        if ($insert) {
                           $msg = ' Profile Updated Successfully';
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

$got_profile = mysqli_query($con, "select * from user_profile where email = '$user_email'");
$fetch = mysqli_fetch_assoc($got_profile);
$passport = $fetch['passport'];
$name = $fetch['fullname'];
$phno =$fetch['phone'];
$boi =$fetch['bio'];
$specx = $fetch['field'];
$socx = $fetch['social_name'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include '..\author/headlink.php';
        ?>

    </head>
    <style type="text/css">
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
                                    <h4 class="page-title">Dashboard </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href=index.php>Dashboard</a>
                                        </li>
                                        <li class="active">
                                           Profile
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!--  breadcrum end row -->

                        <!-- start row of grid -->
                      <div class="row">
                            <div class="col-sm-8 col-xs-8 col-md-8"> 
                                <div class="card-box">
                                    <h4 class="header-title m-t-0">My Profile</h4>
                                    <p class="text-danger font-15 m-b-10">
                                               Kindly Update Your Profile Before doing anything else
                                            </p>
                                            <?php
                                                 echo $message;
                                            ?>

                                            <div class="p-20">
                                                <form action="profile.php" method="post" enctype="multipart/form-data">
                                                    
                                                    <div class="form-group">
                                                        <label for="userName">Email Address</label>
                                                        <input name="email" value="<?=$_SESSION['user']?>" class="form-control" readonly>
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="passWord2">Title: <span class="required">*</span></label>
                                                        <select class="form-control" name="title" required>
                                                            <option value="">select Title</option>
                                                            <option>Prof.</option>
                                                            <option>Dr.</option>
                                                            <option>Mr.</option>
                                                            <option>Mrs.</option>
                                                            <option>Miss.</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="passWord2">Full Name: <span class="required">*</span></label>
                                                        <input type="text" name="fullname" class="form-control" value="<?=$name?>"  required>
                                                        
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="passWord2">Phone Number: <span class="required">*</span></label>
                                                        <input type="number" name="phone" class="form-control" value="<?=$phno?>" required> 
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="passWord2">Biography: <span class="required">*</span></label>
                                                        <textarea class="form-control" name="bio" required><?php echo $boi;?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="passWord2">Specailization: <span class="required">*</span></label>
                                                        <input type="text" name="spec" class="form-control" value="<?=$specx?>" required> 
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="passWord2">Facebook Username: </label>
                                                        <input type="text" name="soc" placeholder="exampl@facebook.com, example@twitter.com" class="form-control" value="<?=$socx?>" required> 
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="passWord2">Passport: <span class="required">*</span></label>
                                                        <input type="file" name="passport" class="form-control" required> 
                                                    </div>

                                                    <div class="form-group text-right m-b-0">
                                                        <button class="btn btn-success waves-effect waves-light" type="submit" name="add_profile">
                                                            Update Profile
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
                                <img src="<?=$passport?>" class="img img-thumbnail">
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
        include '..\author/js.php';
        ?>
    </body>
</html>
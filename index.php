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
    <style type="text/css">
    #conference-title{
        font-style: italic;
        text-shadow: 2px 3px lightblue;
    }
    </style>

    <body>


       <?php
       	include 'topnav.php';
       ?>
        <div class="wrapper">
            <div class="container">
                	<!-- slider and login -->
	        	 <div class="row">
		            <div class="col-lg-9">
	                <div class="card-box">
	                 
	                    <link rel="stylesheet" href="cssslider_files/csss_engine1/style.css">
		<!--[if IE]><link rel="stylesheet" href="cssslider_files/csss_engine1/ie.css"><![endif]-->
		<!--[if lte IE 9]><script type="text/javascript" src="cssslider_files/csss_engine1/ie.js"></script><![endif]-->
		 <div class='csslider1 autoplay '>
		<input name="cs_anchor1" id='cs_slide1_0' type="radio" class='cs_anchor slide' >
		<input name="cs_anchor1" id='cs_slide1_1' type="radio" class='cs_anchor slide' >
		
		<input name="cs_anchor1" id='cs_slide1_3' type="radio" class='cs_anchor slide' >
		<input name="cs_anchor1" id='cs_slide1_4' type="radio" class='cs_anchor slide' >
		<input name="cs_anchor1" id='cs_slide1_5' type="radio" class='cs_anchor slide' >
		<input name="cs_anchor1" id='cs_play1' type="radio" class='cs_anchor' checked>
		<input name="cs_anchor1" id='cs_pause1_0' type="radio" class='cs_anchor pause'>
		<input name="cs_anchor1" id='cs_pause1_1' type="radio" class='cs_anchor pause'>
		<input name="cs_anchor1" id='cs_pause1_2' type="radio" class='cs_anchor pause'>
		<input name="cs_anchor1" id='cs_pause1_3' type="radio" class='cs_anchor pause'>
		<input name="cs_anchor1" id='cs_pause1_4' type="radio" class='cs_anchor pause'>
		<input name="cs_anchor1" id='cs_pause1_5' type="radio" class='cs_anchor pause'>
		
		<ul>
			<li class="cs_skeleton"><img src="cssslider_files/csss_images1/vt1.jpg" style="width: 100%;height:360px;"></li>
			<li class='num0 img slide'> <img src='cssslider_files/csss_images1/campus8.png' alt='slider1' title='slider1' style="height:360px;" /></li>
			<li class='num1 img slide'> <img src='cssslider_files/csss_images1/campus5.png' alt='slider2' title='slider2' style="height:360px;" /></li>
			<li class='num2 img slide'> <img src='cssslider_files/csss_images1/campus.jpg' alt='slider3' title='slider3' style="height:360px;" /></li>
			<li class='num3 img slide'> <img src='cssslider_files/csss_images1/campus2.jpg' alt='slider4' title='slider4' style="height:360px;" /></li>
			<li class='num4 img slide'> <img src='cssslider_files/csss_images1/im1.jpg' alt='slider5' title='slider5' style="height:360px;" /></li>
			<li class='num5 img slide'> <img src='cssslider_files/csss_images1/im2.jpg' alt='slider6' title='slider6' style="height:360px;" /></li>
		</ul><div class="cs_engine"><a href="http://cssslider.com">image slider</a> by cssSlider.com v2.1</div>
		<div class='cs_description'>
			<label class='num0'><span class="cs_title"><span class="cs_wrapper">slider1</span></span></label>
			<label class='num1'><span class="cs_title"><span class="cs_wrapper">slider2</span></span></label>
			<label class='num2'><span class="cs_title"><span class="cs_wrapper">slider3</span></span></label>
			<label class='num3'><span class="cs_title"><span class="cs_wrapper">slider4</span></span></label>
			<label class='num4'><span class="cs_title"><span class="cs_wrapper">slider5</span></span></label>
			<label class='num5'><span class="cs_title"><span class="cs_wrapper">slider6</span></span></label>
		</div>
		<div class='cs_play_pause'>
			<label class='cs_play' for='cs_play1'><span><i></i><b></b></span></label>
			<label class='cs_pause num0' for='cs_pause1_0'><span><i></i><b></b></span></label>
			<label class='cs_pause num1' for='cs_pause1_1'><span><i></i><b></b></span></label>
			<label class='cs_pause num2' for='cs_pause1_2'><span><i></i><b></b></span></label>
			<label class='cs_pause num3' for='cs_pause1_3'><span><i></i><b></b></span></label>
			<label class='cs_pause num4' for='cs_pause1_4'><span><i></i><b></b></span></label>
			<label class='cs_pause num5' for='cs_pause1_5'><span><i></i><b></b></span></label>
			</div>
		<div class='cs_arrowprev'>
			<label class='num0' for='cs_slide1_0'><span><i></i><b></b></span></label>
			<label class='num1' for='cs_slide1_1'><span><i></i><b></b></span></label>
			<label class='num2' for='cs_slide1_2'><span><i></i><b></b></span></label>
			<label class='num3' for='cs_slide1_3'><span><i></i><b></b></span></label>
			<label class='num4' for='cs_slide1_4'><span><i></i><b></b></span></label>
			<label class='num5' for='cs_slide1_5'><span><i></i><b></b></span></label>
		</div>
		<div class='cs_arrownext'>
			<label class='num0' for='cs_slide1_0'><span><i></i><b></b></span></label>
			<label class='num1' for='cs_slide1_1'><span><i></i><b></b></span></label>
			<label class='num2' for='cs_slide1_2'><span><i></i><b></b></span></label>
			<label class='num3' for='cs_slide1_3'><span><i></i><b></b></span></label>
			<label class='num4' for='cs_slide1_4'><span><i></i><b></b></span></label>
			<label class='num5' for='cs_slide1_5'><span><i></i><b></b></span></label>
		</div>
		<div class='cs_bullets'>
			<label class='num0' for='cs_slide1_0'> <span class='cs_point'></span>
				<span class='cs_thumb'><img src='cssslider_files/csss_tooltips1/slider1.jpg' alt='slider1' title='slider1' /></span></label>
			<label class='num1' for='cs_slide1_1'> <span class='cs_point'></span>
				<span class='cs_thumb'><img src='cssslider_files/csss_tooltips1/slider2.jpg' alt='slider2' title='slider2' /></span></label>
			<label class='num2' for='cs_slide1_2'> <span class='cs_point'></span>
				<span class='cs_thumb'><img src='cssslider_files/csss_tooltips1/slider3.jpg' alt='slider3' title='slider3' /></span></label>
			<label class='num3' for='cs_slide1_3'> <span class='cs_point'></span>
				<span class='cs_thumb'><img src='cssslider_files/csss_tooltips1/slider4.jpg' alt='slider4' title='slider4' /></span></label>
			<label class='num4' for='cs_slide1_4'> <span class='cs_point'></span>
				<span class='cs_thumb'><img src='cssslider_files/csss_tooltips1/slider5.jpg' alt='slider5' title='slider5' /></span></label>
			<label class='num5' for='cs_slide1_5'> <span class='cs_point'></span>
				<span class='cs_thumb'><img src='cssslider_files/csss_tooltips1/slider6.png' alt='slider6' title='slider6' /></span></label>
		</div>
		</div>
		<!-- End cssSlider.com -->

	                </div>

	            </div> <!-- end col -->

	            <div class="col-lg-3">
	                <div class="card-box">
	                	

                            <div class="account-pages">
                                <div class="text-center account-logo-box">
                                    <h4 class="text-uppercase">
                                        <a href="#" class="text-white font-italic">
                                            <span>Login In</span>
                                        </a>
                                    </h4>
                                    <!-- <h4 class="text-uppercase font-bold m-b-0">Sign In</h4> -->
                                </div>

                                <div class="account-content">
                                <?php echo $message;?>
                                    <form class="form-horizontal" action="#" method="post">

                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="text" name="username" required="" placeholder="Username">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="password" name="password" required="" placeholder="Password">
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


                            <div class="row m-t-20">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Don't have an account? <a href="page-register.html" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                                </div>
                            </div>

                        
	                </div>

	            </div> <!-- end col -->

	        </div> <!-- end of row -->
	         <div class="row">
             
                    <div class="col-lg-12 col-md-12 col-sm-12">
                    <h3 class="text-center" id="conference-title">Recent Conference News</h3> 
                            <?php
                     $sql = mysqli_query($con, "SELECT * FROM conference_tb ORDER BY id DESC LIMIT 3");
                     if (mysqli_num_rows($sql) > 0) {
                         while ($row = mysqli_fetch_assoc($sql)) {
                            $image_back = $row['conf_image'];
                     ?>
                        
                        <div class="property-card property-horizontal" style="height: auto;">
                            <div class="row">
                                <div class="col-sm-4">

                                    <div class="property-image" style="background: url('<?= 'admin/'.$image_back;?>') center center / cover no-repeat;">
                                    
                                        <span class="property-label label label-warning">Conference image</span>
                                    </div>
                                </div>
                                <!-- /col 4 -->
                                <div class="col-sm-8">
                                    <div class="property-content" style="height: auto;">
                                        <div class="listingInfo" style="border-bottom: none;">
                                            <div class="">
                                            <h3> 
                                                <a href="#" class="text-blue"><?=$row['conf_title']?> </a>
                                            </h3>
                                                <!-- <h4 class="text-success m-t-0"><span>Conference Price: </span><?=$row['conf_fee']?></h4> -->
                                            </div>
                                            <div class="" style="text-align: justify;padding-bottom: 30px;">
                                                
                                                <p class="text-muted"> Venue<i class="mdi mdi-map-marker-radius m-r-5"></i><?=$row['conf_venue'] ." ". "On ". " " .$row['conf_date']." ". "By ". " " .$row['conf_time'] ?></p>

                                                <p class="font-15 text-muted m-b-0" style="height: auto;"><?=$row['conf_desc']?></p>
                                            </div>
                                        </div>
                                        <div class="property-action" style="margin-top: 18px;">
                                            <a href="#" target="new_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="280 particpate"><i class="mdi mdi-view-grid"></i><span>280</span></a>
                                            <a href="#" target="new_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="4 Bedroom House"><i class="mdi mdi-hotel"></i><span>4</span></a>
                                            <a href="#" target="new_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="2 Parking space"><i class="mdi mdi-car"></i><span>2</span></a>
                                            <a href="#" target="new_blank" data-toggle="tooltip" data-placement="top" title="" data-original-title="24h Electricity"><i class="mdi mdi-battery-charging-80"></i><span> 24H</span></a>
                                            <div class="pull-right">
                                                <a href="confrence-Register.php?id=<?php echo htmlentities($row['id']);?>" class="btn btn-success btn-rounded"><i class="mdi mdi-account-check"></i><span>Register</span></a>
                                            </div>
                                        </div>
                                        <!-- end. Card actions -->
                                    </div>
                                </div>
                                <!-- /col 8 -->
                            </div>
                            <!-- /inner row -->
                        </div>
                        <!-- End property item -->
                        <?php
                                            }

                                        }
                                        else{
                                            echo '<p class="text-center">No Conference Available</p>';
                                        }
                                       ?>

                    </div> <!-- end col -->

               
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
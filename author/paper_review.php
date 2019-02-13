<?php
include '..\admin/includes/connection.php';
session_start();
if (empty($_SESSION['user']) || $_SESSION['user'] == '' || $_SESSION['user'] == null) {
    header('location:../index.php');
}
$user_email = $_SESSION['user'];
$get = $_GET['id'];
$select = mysqli_query($con, "select * from upload_document where id = '$get'");

$rows = mysqli_fetch_assoc($select);

$conf_id = $rows['conf_id'];
//echo $conf_id;
$query = mysqli_query($con, "select * from conference_tb where id ='$conf_id'") or die(mysqli_error($con));
$fetch = mysqli_fetch_assoc($query);
$title = $fetch['conf_title'];

//comment query
if (isset($_POST['commentBtn'])) {
    $messages = $_POST['message'];
    $date_create = date('Y-m-d');

$comt_query = mysqli_query($con, "INSERT INTO comment_tb(conf_id,document_id,message,comment_by,date_create)VALUES('$conf_id','$get','$messages','$user_email','$date_create')") or die(mysqli_error($con));
    if ($comt_query) {
        echo "<script>alert('Comment Place Successfuly')</script>";
    }
    else
       echo "<script>alert('Error Occur!!! Please Try again')</script>"; 
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include 'headlink.php';
        ?>

    </head>
    <script type="text/javascript">
        function valid()
        {

        var x = $('#message2').val().length;
        if(x< 1){
            alert("Message Filed can not be empty");
            //document.getElementbyId('message2').style.border ="red";
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
                                    <h4 class="page-title">Paper Reviewer </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href=myPaper.php>My paper</a>
                                        </li>
                                       
                                        <li class="active">
                                           Paper  Reviewer
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!--  breadcrum end row -->

                        <!-- start row of grid -->
                      <div class="row">
                            <div class="col-sm-11">
                            <div class="p-20">

                                <!-- Image Post -->
                                <div class="blog-post m-b-30">
                                    <div class="panel panel-info panel-border">
                                        <div class="panel-heading">
                                            <div class="panel-body">
                                                
                                               <iframe src = "..\ViewerJS/cmp409.pdf" width='800' height='300' allowfullscreen webkitallowfullscreen></iframe>
                                            
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="post-title">
                                        <h3>Conference Title: <a href=""><?php echo $title; ?></a></h3>
                                    </div>
                                    <div>
                                        <p>
                                           About paper:<span>  </span>
                                        </p>

                                        <blockquote class="custom-blockquote margin-t-30">
                                            <p>
                                                <?=$rows['about'];?>
                                            </p>
                                            <footer>
                                                 <cite title="Source Title"><?php echo $_SESSION['user'] ?></cite>
                                            </footer>
                                        </blockquote>

                                        

                                        <div class="text">
                                            <h4 ><i class="text-danger"> Reviwers :</i>
                                           
                                                <?php
                                                    // $sql_query = mysqli_query($con, "select * from upload_document where author_email ='".$_SESSION['user']."'");
                                                    if (mysqli_num_rows($select)>0)
                                                    {
                                                        
                                                           echo $rows['reviewer'] . '<br>';
                                                       }
                                                    else{
                                                        echo "No Reviwer has been attach to this paper";
                                                    }

                                                ?>
                                            </h4>
                                        </div>

                                        <div class="text">
                                            <h4 ><i class="text-info"> Status :</i>
                                            
                                            <?php
                                               if (empty($rows['status'])) {
                                                     echo '<button class="btn btn-warning">Pending</button>';
                                                 }
                                                 elseif ($rows['status']==1) {
                                                     echo '<button class="btn btn-success">Approve</button>';
                                                 }
                                                 else{
                                                    echo '<button class="btn btn-danger">Rejected</button>';
                                                 } 

                                            ?>
                                            </h4>
                                        </div>
                                        
                                    </div>

                                </div>

                                <hr/>
                                    <?php
                                         $sql = mysqli_query($con,"select * from comment_tb where document_id = '$get'");
                                    ?>
                                <div class="m-t-50 blog-post-comment">
                                    <h4 class="text-uppercase">Comments <small>(<?=mysqli_num_rows($sql);?>)</small></h4>
                                    <div class="border m-b-20"></div>

                                    <?php
                                        while ($getrow = mysqli_fetch_assoc($sql)) {
                                            $commentby = $getrow['comment_by'];
                                            $img_query = mysqli_query($con, "select * from user_profile where email = '$commentby'") or die(mysqli_error($con));
                                            $select_type = mysqli_query($con, "select * from user_tb where email = '$commentby'") or die(mysqli_error($con));
                                            while ($img_chk = mysqli_fetch_assoc($img_query)) {
                                                
                                                //var_dump($img);
                                                while ($user_type = mysqli_fetch_assoc($select_type)) {
                                                    $img = $img_chk['passport'];
                                                    $usertype = $user_type['usertype'];
                                               
                                            ?>

                                    <ul class="media-list">

                                        <li class="media">
                                            <a class="pull-left" href="#">
                                                <?php
                                                    if($usertype == 'reviewer'){?>
                                                        <img class="media-object img-circle" src="<?php echo '..\reviewer/'.$img_chk['passport']?>" alt="user image">
                                                   <?php 
                                               }
                                               else
                                               {?>
                                                    <img class="media-object img-circle" src="<?php echo $img_chk['passport']?>" alt="user image">
                                              <?php }

                                                 ?>
                                                
                                            </a>
                                            <div class="media-body">
                                                <h5 class="media-heading"><?=$img_chk['fullname']?></h5>
                                                <h6 class="text-muted"><?=$getrow['date_create']?></h6>
                                                <p><?=$getrow['message']?>.</p>
                                                <a href="#form" class="text-success"><i
                                                        class="mdi mdi-reply"></i>&nbsp; Reply</a>
                                            </div>
                                        </li>

                                       
                                    </ul>

                                      <?php  }  
                                        }
                                    }
                                    ?>                                    
                                    <h4 class="text-uppercase m-t-50">Leave a comment</h4>
                                    <div class="border m-b-20"></div>

                                    <form name="ajax-form" action="" method="post" class="contact-form" data-parsley-validate="" novalidate="" id="form">
                                        <div class="form-group">
                                            <input class="form-control" id="email2" name="email" type="email"  value="<?=$_SESSION['user']?>" disabled>
                                        </div>
                                        <!-- /Form-email -->

                                        <div class="form-group">
                                            <textarea class="form-control" id="message2" name="message" rows="5" placeholder="Message" required></textarea>
                                        </div>
                                        <!-- /Form Msg -->

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="">
                                                    <button type="submit" class="btn btn-custom" onclick="return valid();" id="send" name="commentBtn">Submit</button>
                                                </div>
                                            </div> <!-- /col -->
                                        </div> <!-- /row -->

                                    </form>


                                </div><!-- end m-t-50 -->

                            </div> <!-- end p-20 -->
                        </div> <!-- end col -->
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
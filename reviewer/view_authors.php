<?php
include '..\admin/includes/connection.php';
session_start();
if (empty($_SESSION['user']) || $_SESSION['user'] == '' || $_SESSION['user'] == null) {
    header('location:../index.php');
}
$get = $_GET['id'];
if (empty($get)) {
   header('location:author_list.php');
}
$select = mysqli_query($con, "select * from upload_document where id = '$get'");

$rows = mysqli_fetch_assoc($select);

$conf_id = $rows['conf_id'];
$get_email = $rows['email'];
$rev = $rows['reviewer'];
//echo $conf_id;
$query = mysqli_query($con, "select * from conference_tb where id ='$conf_id'") or die(mysqli_error($con));
$fetch = mysqli_fetch_assoc($query);
$title = $fetch['conf_title'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        include '..\author/headlink.php';
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
                                    <h4 class="page-title">Dashboard </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href=index.php>Dashboard</a>
                                        </li>
                                        <li>
                                            <a href=author_list.php>authors</a>
                                        </li>
                                        <li class="active">
                                           Dashboard
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!--  breadcrum end row -->

                        <!-- start row of grid -->
                        <div class="row">
                            <div class="col-sm-8">
                            <div class="p-20">

                                <!-- Image Post -->
                                <div class="blog-post m-b-30">
                                    <div class="panel panel-info panel-border">
                                        <div class="panel-heading">
                                            <div class="panel-body">
                                               <iframe src = "..\ViewerJS/cmp409.pdf" width='600' height='300' allowfullscreen webkitallowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-muted"><span>by <a class="text-dark font-secondary">John Doe</a>,</span> <span>Sep 10, 2016</span></div>
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
                                                 <cite title="Source Title"><?php echo 'author email' ." ".$get_email ?></cite>
                                            </footer>
                                        </blockquote>

                                        

                                        <div class="text">
                                            <h4 ><i class="text-danger"> Reviwers :</i>
                                           
                                                <?php
                                                    
                                                    if (mysqli_num_rows($select)>0){
                                                        echo $rev;
                                                        // while ($data = mysqli_fetch_assoc($select)) {
                                                        //     echo $data['reviewer'] . '<br>';
                                                        // }
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

                                <div class="m-t-50 blog-post-comment">
                                    <h4 class="text-uppercase">Comments <small>(0)</small></h4>
                                    <div class="border m-b-20"></div>

                                    <ul class="media-list">

                                        <li class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object img-circle"
                                                     src="assets/images/users/avatar-2.jpg" alt="img">
                                            </a>
                                            <div class="media-body">
                                                <h5 class="media-heading">Johnathan deo</h5>
                                                <h6 class="text-muted">March 23, 2016, 11:45 am</h6>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam
                                                    viverra euismod odio, gravida pellentesque urna varius
                                                    vitae. Sed dui lorem, adipiscing in adipiscing et, interdum
                                                    nec metus. Mauris ultricies, justo eu convallis placerat,
                                                    felis enim.</p>
                                                <a href="#" class="text-success"><i
                                                        class="mdi mdi-reply"></i>&nbsp; Reply</a>
                                            </div>
                                        </li>

                                       
                                    </ul>

                                    <h4 class="text-uppercase m-t-50">Leave a comment</h4>
                                    <div class="border m-b-20"></div>

                                    <form name="ajax-form" action="#" method="post" class="contact-form" data-parsley-validate="" novalidate="">

                                        <div class="form-group">
                                            <input class="form-control" id="name2" name="name" placeholder="Your name" type="text" value="" required="">
                                        </div>
                                        <!-- /Form-name -->

                                        <div class="form-group">
                                            <input class="form-control" id="email2" name="email" type="email" placeholder="Your email" value="" required="">
                                        </div>
                                        <!-- /Form-email -->

                                        <div class="form-group">
                                            <textarea class="form-control" id="message2" name="message" rows="5" placeholder="Message" required=""></textarea>
                                        </div>
                                        <!-- /Form Msg -->

                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="">
                                                    <button type="submit" class="btn btn-custom" id="send">Submit</button>
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
        include '..\author/js.php';
        ?>
    </body>
</html>
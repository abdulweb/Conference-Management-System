<?php
include '..\admin/includes/connection.php';
session_start();
if (empty($_SESSION['user']) || $_SESSION['user'] == '' || $_SESSION['user'] == null) {
    header('location:../index.php');
}
$user_email = $_SESSION['user'];
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
                                        <li class="active">
                                           Authors
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
                                    <?php //echo $message; ?>
                                    <h3>Author Marged</h3>
                                    
                                   <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th> Author Name</th>
                                    <th>Author Email</th>
                                    <th>Conference Title</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                    <?php
                                        $sql = mysqli_query($con, "select * from reviewer_author where reviewer_email ='$user_email'") or die(mysqli_error($con));
                                        $counter = 1;
                                        while ($row = mysqli_fetch_assoc($sql)) {
                                          $conf_id = $row['conf_id'];
                                          $author_email = $row['author_email'];
                                          $select = mysqli_query($con, "select * from conference_tb where id = '$conf_id'");
                                          while ($rows = mysqli_fetch_assoc($select)) {
                                           $name = mysqli_query($con, "select * from user_profile where email ='$author_email'");
                                           while ($data = mysqli_fetch_assoc($name)) {
                                               
                                          
                                          ?>
                                            
                                <tbody>
                                 <tr id="row<?php echo $row['id'];?>">
                                    <td><?=$counter?></td>
                                    <td ><?=$data['fullname']?></td>
                                    <td ><?=$row['author_email']?></td>
                                    <td><?=$rows['conf_title']?></td>
                                    <td style="padding-left: 20px;">
                                        <a href="#"  class="on-editing save" id="save_button<?php echo $row['id'];?>" onclick="save_row('<?php echo $row['id'];?>');"><i class="fa fa-save"></i></a>

                                        <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>

                                        <a href="#"  id="edit_button<?php echo $row['id'];?>" class="on-default edit-row" onclick="edit_fee('<?php echo $row['id'];?>');"><i class="fa fa-pencil" style="margin-right: 5px;"></i> </a>

                                        
                                    </td>
                                </tr>
                                </tbody>
                                   <?php
                                 }
                             }
                               $counter++;}
                                    ?>
                            </table>
                                        
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
        include '..\author/js.php';
        ?>
    </body>
</html>
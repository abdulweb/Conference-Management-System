<?php
include '../connection.php';
session_start();
error_reporting(0);
//$_SESSION['message'] ='';
if (empty($_SESSION['user']) || $_SESSION['user'] == '' || $_SESSION['user'] == null) 
{
    header('location:../index.php');
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

        <link rel="shortcut icon" href="..\assets/images/favicon.ico">

        <title>Conference Management System</title>

        <!-- App css -->
        <link href="..\assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="..\assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="..\assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="..\assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="..\assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="..\assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="..\assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../plugins/switchery/switchery.min.css">

        <script src="..\assets/js/modernizr.min.js"></script>


    </head>


    <body>


       <?php
        include 'include/topnav.php';
       ?>
        
     
                
            <!-- footer section -->
            <?php
            include 'include/footer.php';
            unset($_SESSION['message']);
            ?>
            <!-- end of footer -->
            </div> <!-- end container -->
        </div>
        <div class="wrapper">
            <div class="container">
                    
                    <div class="row">
                        <div class="col-md-12">
                             <div class="property-card property-horizontal" style="height: auto; margin-top: 40px;">
                            <div class="row">
                                
                                <div class="col-sm-12">
                                    <div class="property-content" style="height: auto; ">
                                    
                                        <div class="card-box">
                                            <h4 class="header-title m-t-0 text-primary">Participant Registration</h4>
                                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th> Conference Title</th>
                                    <th>Start Date</th>
                                    <th>End Date </th>
                                     <th>Payment Status</th>
                                    <th>Invoice</th>
                                    
                                </tr>
                                    </thead>
                                        <?php
                                            $sql = mysqli_query($con, "select * from conference_reg_tb where user_email = '$user_email'") or die(mysqli_error($con));
                                            $counter = 1;
                                            while ($row = mysqli_fetch_assoc($sql)) {
                                              $conf_id = $row['conf_id'];
                                              $select = mysqli_query($con, "select * from conference_tb where id = '$conf_id'");
                                              while ($rows = mysqli_fetch_assoc($select)) {
                                                $get_fee = mysqli_query($con,"select * from fee_tb where conf_id = '$conf_id'");
                                                while ($fees = mysqli_fetch_assoc($get_fee)) {
                                                
                                                
                                              
                                              ?>
                                                
                                    <tbody>
                                     <tr >
                                        <td><?=$counter?></td>
                                        <td ><?=$rows['conf_title']?></td>
                                        <td><?=$rows['conf_date']?></td>
                                        <td ><?=$rows['conf_end_date']?> </td>
                                        <td>
                                            <?php
                                                if ($row['payment_status'] == 0) {
                                                    echo '<span class="label label-danger">Pending</span>';
                                                }
                                                else
                                                    echo '<span class="label label-success">Success</span>';
                                            ?>
                                        </td>
                                        <td>
                                           <a href="invoice.php?id=<?php echo htmlentities($row['id']);?>"><i class="fa fa-print" style="color: red; font-size: 22px;"> </i></a>
                                        </td>
                                       
                                    </tr>
                                    </tbody>
                                   <?php
                                 }
                             $counter++;}
                               }
                                    ?>
                            </table>
                                        </div>

                                    </div>
                                </div>
                                <!-- /col 8 -->
                            </div>
                            <!-- /inner row -->
                        </div>
                        </div>
                    </div>
        <!-- end wrapper -->


        <!-- jQuery  -->
        <script src="..\assets/js/jquery.min.js"></script>
        <script src="..\assets/js/bootstrap.min.js"></script>
        <script src="..\assets/js/detect.js"></script>
        <script src="..\assets/js/fastclick.js"></script>
        <script src="..\assets/js/jquery.blockUI.js"></script>
        <script src="..\assets/js/waves.js"></script>
        <script src="..\assets/js/jquery.slimscroll.js"></script>
        <script src="..\assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- App js -->
        <script src="..\assets/js/jquery.core.js"></script>
        <script src="..\assets/js/jquery.app.js"></script>

    </body>
</html>
<?php
include '../connection.php';
session_start();
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
       $get_id = $_GET['id'];
        $query = mysqli_query($con, "SELECT * FROM conference_reg_tb where id = '$get_id'");
        $rows = mysqli_fetch_assoc($query);
        $email = $rows['user_email'];
        $paymentStatus = $rows['payment_status'];
        $conf_id = $rows['conf_id'];

        $sql = mysqli_query($con,"select * from conference_tb where id = '$conf_id'");
        $conf_row = mysqli_fetch_assoc($sql);

        $fee_query = mysqli_query($con, "select * from fee_tb where conf_id ='$conf_id'");
        $data = mysqli_fetch_assoc($fee_query);
        include 'include/topnav.php';
       ?>
        <div class="wrapper">
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <br>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <!-- <div class="panel-heading">
                                <h4>Invoice</h4>
                            </div> -->
                            <div class="panel-body">
                                <div class="clearfix">
                                    <div class="pull-left">
                                        <h3><img src="assets/images/logo_sm.png" alt="" height="24"> EOCMS</h3>
                                    </div>
                                    <div class="pull-right">
                                        <h4>Invoice ID <br>
                                            <strong> <?php echo substr(md5($conf_id.$email), 0,10) ?></strong>
                                        </h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="pull-left m-t-30">
                                            <address>
                                              <strong>Account Deatils.</strong><br>
                                              <span class="font-bold">Account Name : </span> Ecoms <br>
                                              <span class="font-bold">Account Number : </span> 017823416<br>
                                              <abbr title="Phone">call center:</abbr> (+123) 456-7890
                                              </address>
                                        </div>
                                        <div class="pull-right m-t-30">
                                            <p><strong>Conference End Date: </strong> <?=$conf_row['conf_end_date']?></p>
                                            <p><strong>payment Status: </strong> 
                                            <?php
                                                if ($paymentStatus==0) {
                                                   echo '<span class="label label-danger">Pending</span></p>';
                                                }
                                                else
                                                    echo '<span class="label label-success">Processed</span></p>';
                                            ?>
                                            
                                            <p><strong>Transaction ID: </strong> <em>#<?= substr(md5($paymentStatus),0, 10)?></em></p>
                                        </div>
                                    </div><!-- end col -->
                                </div>
                                <!-- end row -->

                                <div class="m-h-50"></div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table table-bordered m-t-30">
                                                <thead>
                                                    <tr><th>#</th>
                                                    <th>Conference Title</th>
                                                    <th>Description</th>
                                                    <th>Venue</th>
                                                    <th>Conference Fee</th>
                                                    <th>Total</th>
                                                </tr></thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td><?=$conf_row['conf_title']?></td>
                                                        <td> <?=$conf_row['conf_desc']?></td>
                                                        <td> <?=$conf_row['conf_venue']?></td>
                                                        <td><?=$data['author']?></td>
                                                        <td><?=$data['author']?></td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <div class="clearfix m-t-40">
                                            <h5 class="small text-inverse font-600">PAYMENT TERMS AND POLICIES</h5>

                                            <small>
                                                All accounts are to be paid within 7 days from receipt of
                                                invoice. To be paid to any of the bank listed below.
                                                If conference fee is not paid within 7 days conference registration will be cancle.<br>
                                                <img src="../images/gt logo.png" alt="gtbank" class="img img-thumbnail" width="90px" height="30px">
                                                <img src="../images/uba.jpg" alt="gtbank" class="img img-thumbnail" width="50px" height="10px">
                                                <img src="../images/polari.jpg" alt="gtbank" class="img img-thumbnail" width="50px" height="10px">
                                                <img src="../images/Union-bank.jpg" alt="gtbank" class="img img-thumbnail" width="50px" height="10px">
                                                <img src="../images/Verve-Card.png" alt="gtbank" class="img img-thumbnail" width="50px" height="10px">
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-6 col-md-offset-3">
                                        <!-- <p class="text-right"><b>Sub-total:</b> 38000.00</p> -->
                                        <p class="text-right">Discout: 00.0%</p>
                                        <p class="text-right">VAT: 00.0%</p>
                                        <hr>
                                        <h3 class="text-right">NRN <?=$data['author']?></h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="hidden-print">
                                    <div class="pull-right">
                                        <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                        <a href="myconference.php" class="btn btn-primary waves-effect waves-light">Cancel</a>
                                    </div>
                                </div>
                                <small>Date: <?=date('Y/m/d')?></small>
                            </div>
                        </div>

                    </div>

                </div>
                <!-- end row -->


                <!-- Footer -->
                <?php
                include '..\admin/includes/footer.php';
               ?>
                <!-- End Footer -->

            </div> <!-- end container -->
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
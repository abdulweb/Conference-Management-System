<?php
include 'includes/connection.php';
include("..\phpmailer-master/class.phpmailer.php");
include("..\phpmailer-master/class.smtp.php");
session_start();
if (empty($_SESSION['user']) || $_SESSION['user'] == '' || $_SESSION['user'] == null) 
{
    header('location:../index.php');
}
if (isset($_POST['add_reviewer'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $date_create = date('Y-m-d');
     $sql = mysqli_query($con, "select * from user_tb where usertype ='$email'");
     if (mysqli_num_rows($sql)>0) {
         echo "<script>alert('User Already Exist')</script>";
     }
     else{
            // $mail = new PHPMailer();

            // $mail->IsSMTP();
            // $mail->SMTPAuth   = true;                  // enable SMTP authentication
            // $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
            // $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
            // $mail->Port       = 465; //or 587

            // $mail->Username   = "binraheem01@gmail.com";  // GMAIL username
            // $mail->Password   = "babatunde";            // GMAIL password
            // $mail ->SetFrom('Onine Conference Management');

            // $mail->From     = $email;
            // $mail->FromName   = "no-reply";
            // $mail->Subject    = "Your Personal Account";
            // $mail->Body    = "Kindly Login with the following credential and Update Your Profile "; //Text Body
            // $mail->WordWrap   = 50; // set word wrap
            // $mail ->AddAddress($email);
            // // $mail->AddAttachment('images/'.$Uname.'.pdf');
            // if(!$mail->Send())
            // {
            //    echo "Message could not be sent. <p>";
            //    echo "Mailer Error: " . $mail->ErrorInfo;
            //    exit;
            // }
            // else
            // {
                    $query_sql = mysqli_query($con, "INSERT INTO user_tb(email,username,password,usertype,date_create)VALUES('$email','$username','$password','reviewer','$date_create')") or die(mysqli_error($con));
                    if ($query_sql) {
                        echo "<script>alert('New Reviewer Added Successfully')</script>";
                    }
                    else
                    {
                         echo "<script>alert('Error Occur /n Please Retry')</script>";
                    }
            }
        
        
           
     // }
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
            <!-- plugin css -->
        <link rel="stylesheet" href="../plugins/magnific-popup/css/magnific-popup.css" />
        <link rel="stylesheet" href="../plugins/jquery-datatables-editable/datatables.css" />

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
        .save{
            display: none;
        }
    </style>
    <script type="text/javascript">
function valid()
{
if(document.addemp.password.value!= document.addemp.confirmpassword.value)
{
alert(" Password and Confirm Password does not match  !!");
document.addemp.confirmpassword.focus();
return false;
}
// check if all is empty
var mail = $('#email').val().length;
var username = $('#username').val().length;
var conpass = $('#confirmpassword').val().length;
if(mail<1 || username <1 || conpass < 1){
    alert("All Field Must Be fill");
    return false;
}
// check is password is more than four character
var x = $('#password').val().length;
if(x< 4)
{
    alert("Passwords must be More than four character.");
    return false;
}

    
}
</script>
    <body class="fixed-left" style="color: rgb(51,51,51);">

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
                                    <h4 class="page-title">Manage Reviewer </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="index.php">Dashboard</a>
                                        </li>
                                        
                                        <li class="active">
                                            Manage Reviewer
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
                           <div class="panel panel-primary">
                            <div style="padding-bottom: 10px;"><button class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#con-author-modal"> <i class="mdi mdi-table-edit"> </i>Add Reviewer</button></div>
                               <div class="panel-heading"> <i class="fa fa-user"> </i> <strong>List of Available Reviewer </strong></div>
                               <div class="panel-body">
                                    <h4 class="m-t-0 header-title"><b></b></h4>
                            <p class="text-muted font-13 m-b-30">
                               
                            </p>

                            <table id="datatable-buttons" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th> Reviewer Name</th>
                                    <th>Reviewer Email</th>
                                    <th>Field</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                    <?php
                                    error_reporting(0);
                                        $sqlx = mysqli_query($con, "select * from user_tb where usertype = 'reviewer'") or die(mysqli_error($con));

                                        $counter = 1;
                                        while ($row = mysqli_fetch_assoc($sqlx)) {
                                          $auth_email = $row['email'];
                                          $select = mysqli_query($con, "select * from user_profile where email = '$auth_email'");
                                          if (mysqli_num_rows($select) < 1) {?>
                                             <tbody>
                                                 <tr>
                                                     <td><?counter?></td>
                                                     <td> </td>
                                                     <td><?=$row['email']?></td>
                                                     <td> </td>
                                                     <td style="padding-left: 18px;"> 
                                                     <a href=""  ><i class="fa fa-desktop"></i></a>

                                                    <a href="#"  class="on-editing save" id="save_button<?php echo $row['id'];?>" onclick="save_row('<?php echo $row['id'];?>');"><i class="fa fa-save"></i></a>

                                                    <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>

                                                    <a href="#"  id="edit_button<?php echo $row['id'];?>" class="on-default edit-row" onclick="edit_fee('<?php echo $row['id'];?>');"><i class="fa fa-pencil" style="margin-left: 5px;"></i> </a>

                                                     </td>
                                                 </tr>
                                             </tbody>
                                         <?php }
                                          else{


                                          while ($rows = mysqli_fetch_assoc($select)) {
                                            
                                                // code...
                                           
                                          
                                          ?>
                                            
                                <tbody>
                                 <tr id="row<?php echo $row['id'];?>">
                                    <td><?=$counter?></td>
                                    <td id="title<?php echo $row['id'] ?>"><?=$rows['fullname']?></td>
                                    <td><?=$row['email']?></td>
                                    <td id="title<?php echo $row['id'] ?>"><?=$rows['field']?></td>
                                    <td style="padding-left: 20px;">
                                    <a href=""  ><i class="fa fa-desktop"></i></a>

                                        <a href="#"  class="on-editing save" id="save_button<?php echo $row['id'];?>" onclick="save_row('<?php echo $row['id'];?>');"><i class="fa fa-save"></i></a>

                                        <a href="#" class="hidden on-editing cancel-row"><i class="fa fa-times"></i></a>

                                        <a href="#"  id="edit_button<?php echo $row['id'];?>" class="on-default edit-row" onclick="edit_fee('<?php echo $row['id'];?>');"><i class="fa fa-pencil" style="margin-right: 5px;"></i> </a>

                                        
                                    </td>
                                </tr>
                                </tbody>
                                   <?php
                                }
                                    $counter++; }
                               }
                                    ?>
                            </table>
                               </div>
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

<div id="con-author-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" class="">Reviewer Info</h4>
                </div>
                <form method="post" action="" name="addemp">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="passWord2">Email: <span class="required">*</span></label>
                                    <input type="email" name="email" parsley-trigger="change" required
                                            class="form-control" id="email">
                                </div>
                            
                                <div class="form-group">
                                    <label for="userName">Username<span class="required">*</span></label>
                                    <input type="text" name="username" parsley-trigger="change" required
                                            class="form-control" id="username">    
                                </div>
                                <div class="form-group">
                                    <label for="userName">password<span class="required">*</span></label>
                                    <input type="password" name="password" id="password" parsley-trigger="change" required
                                            class="form-control" >
                                </div>
                                <div class="form-group">
                                    <label for="userName">confrim Password<span class="required">*</span></label>
                                    <input type="password" name="confirmpassword" parsley-trigger="change" required
                                            class="form-control" id="confirmpassword">
                                </div>

                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="add_reviewer" class="btn btn-success waves-effect" onclick="return valid();">Submit</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
</div><!-- /.modal -->


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

        <!-- Example jquery -->
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables/dataTables.bootstrap.js"></script>

        <script src="../plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="../plugins/datatables/buttons.bootstrap.min.js"></script>
        <script src="../plugins/datatables/jszip.min.js"></script>
        <script src="../plugins/datatables/pdfmake.min.js"></script>
        <script src="../plugins/datatables/vfs_fonts.js"></script>
        <script src="../plugins/datatables/buttons.html5.min.js"></script>
        <script src="../plugins/datatables/buttons.print.min.js"></script>
        <script src="../plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="../plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="../plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="../plugins/datatables/responsive.bootstrap.min.js"></script>
        <script src="../plugins/datatables/dataTables.scroller.min.js"></script>
        <script src="../plugins/datatables/dataTables.colVis.js"></script>
        <script src="../plugins/datatables/dataTables.fixedColumns.min.js"></script>
         <!-- init -->
        <script src="assets/pages/jquery.datatables.init.js"></script>
        
        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

       <script>

            $(document).ready(function () {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable({keys: true});
                $('#datatable-responsive').DataTable();
                $('#datatable-colvid').DataTable({
                    "dom": 'C<"clear">lfrtip',
                    "colVis": {
                        "buttonText": "Change columns"
                    }
                });
                $('#datatable-scroller').DataTable({
                    ajax: "../plugins/datatables/json/scroller-demo.json",
                    deferRender: true,
                    scrollY: 380,
                    scrollCollapse: true,
                    scroller: true
                });
                var table = $('#datatable-fixed-header').DataTable({fixedHeader: true});
                var table = $('#datatable-fixed-col').DataTable({
                    scrollY: "300px",
                    scrollX: true,
                    scrollCollapse: true,
                    paging: false,
                    fixedColumns: {
                        leftColumns: 1,
                        rightColumns: 1
                    }
                });
            });
            TableManageButtons.init();


  function edit_fee(id)
{
    //alert('hey');
 //var title=document.getElementById("title"+id).innerHTML;
 var user=document.getElementById("user"+id).innerHTML;
 var author=document.getElementById("author"+id).innerHTML;
 document.getElementById("user"+id).innerHTML="<input type='text' class='form-control' autofocus id='user_text"+id+"' value='"+user+"'>";
 document.getElementById("author"+id).innerHTML="<input type='text' class='form-control' id='author_text"+id+"' value='"+author+"'>";
    
 document.getElementById("edit_button"+id).style.display="none";
 document.getElementById("save_button"+id).style.display="block";
}

function save_row(id)
{
 var user=document.getElementById("user_text"+id).value;
 var author=document.getElementById("author_text"+id).value;
    
 $.ajax
 ({
  type:'post',
  url:'modify_records.php',
  data:{
   edit_fee:'edit_fee',
   row_id:id,
   user:user,
   author:author,
  },
  success:function(response) {
   if(response=="success")
   {
    document.getElementById("user"+id).innerHTML=user;
    document.getElementById("author"+id).innerHTML=author;
    document.getElementById("edit_button"+id).style.display="block";
    document.getElementById("save_button"+id).style.display="none";
    alert('Record Updated Successfully');
   }
   else{
    alert('something goes wrong');
   }
  }

 });
}

        </script>
       

    </body>
</html>
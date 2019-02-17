<?php
include '..\admin/includes/connection.php';
session_start();
if (empty($_SESSION['user']) || $_SESSION['user'] == '' || $_SESSION['user'] == null) {
    header('location:../index.php');
}
else{
    $user_email = $_SESSION['user'];
    $get_id = $_GET['id'];
    //check if the author upload document 
    $select_query = mysqli_query($con, "select * from upload_document where conf_id ='$get_id' and email = '$user_email'");
    if (mysqli_num_rows($select_query)) 
    {
         $msg = ' Sorry You can unregister without deleting the upload document';
         $message = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                    </div>';
                     $_SESSION['message'] =$message;
                     header('location:conference.php');
    }
    else
    {
        $delet = mysqli_query($con, "DELETE FROM conference_reg_tb where conf_id = '$get_id' and user_email ='$user_email'");
        if ($delet) {
             $msg = ' You have unregister for this conference Successfully';
         $message = '<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="mdi mdi-block-helper"></i><strong></strong>'.$msg.' 
                    </div>';
                     $_SESSION['message'] =$message;
                     header('location:conference.php');
        }
    }
   
    
}
?>

<?php
include '..\admin/includes/connection.php';
session_start();
if (empty($_SESSION['user']) || $_SESSION['user'] == '' || $_SESSION['user'] == null) {
    header('location:../index.php');
}
else{
    $user_email = $_SESSION['user'];
    $get_id = $_GET['id'];
    //fetch conference
    $select_query = mysqli_query($con, "select * from conference_tb where id ='$get_id'");
    $select_row = mysqli_fetch_assoc($select_query);
    $end_date = $select_row['conf_date'];

    $select = mysqli_query($con, "SELECT * from conference_reg_tb where conf_id ='$get_id' and user_email = '$user_email'");
    if(mysqli_num_rows($select)> 0)
    {
          $msg = ' Sorry You have register for this conference';
         $message = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                    </div>';
        $_SESSION['message'] =$message;
        header('location:conference.php');
    }
    else{
        $sql_query = mysqli_query($con, "INSERT INTO conference_reg_tb(conf_id,user_email,end_date)VALUES('$get_id','$user_email','$end_date')") or die(mysqli_error($con));
        if ($sql_query) 
        {
            $msg = ' Registration Successfully. Kindly check your mail to print your conference detail';
            $message = '<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="mdi mdi-check"></i><strong>Congratulation!!</strong>'.$msg.' 
                    </div>';
            $_SESSION['message'] =$message;
            header('location:conference.php');
        }
        else
        {
            $msg = ' Error Occured. Please Retry again';
            $message = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="mdi mdi-block-helper"></i><strong>Attension!!</strong>'.$msg.' 
                    </div>';
            $_SESSION['message'] =$message;
            header('location:conference.php');
        }
    }

    
}
?>

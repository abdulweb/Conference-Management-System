<?php
include 'includes/connection.php';
session_start();
error_reporting(0);
if (empty($_SESSION['user']) || $_SESSION['user'] == '' || $_SESSION['user'] == null) 
{
    header('location:../index.php');
}

$get_id = $_GET['id'];
if (empty($get_id) || $get_id ==null) {
       header('location:createConference.php');
}
$getconf = mysqli_query($con, "DELETE FROM conference_tb where id = '$get_id'") or die(mysqli_error($con));
if ($getconf) {
		$msg = ' Record Deleted Successfully';
                $_SESSION['message'] = '<div class="alert alert-icon alert-success alert-dismissible fade in" role="alert"> 
                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <i class="mdi mdi-block-helper"></i>
                                                <strong> </strong>'.$msg.' 
                                            </div>';
                                    header('location:manageConference.php');
}
else{
	$msg = ' Deleting Record Fail .Please Retry';
                $_SESSION['message'] = '<div class="alert alert-icon alert-danger alert-dismissible fade in" role="alert"> 
                <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <i class="mdi mdi-block-helper"></i>
                                                <strong>oh whoop!!!</strong>'.$msg.' 
                                            </div>';
                                    header('location:manageConference.php');	
}
?>
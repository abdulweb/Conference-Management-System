<?php
include 'includes/connection.php';
session_start();
$message = $msg = ""; $_SESSION['message_verify'] = "";
if (empty($_SESSION['user']) || $_SESSION['user'] == '' || $_SESSION['user'] == null) {
    header('location:../index.php');
}
if (empty($_GET['getid'])) {
    header('location:view_author.php');
}
else{
	$get_id = $_GET['getid'];
	$query = mysqli_query($con, "SELECT * from upload_document where id = '$get_id' ");
	$rows = mysqli_fetch_assoc($query);
	$email = $rows['email'];
	$conf_id = $rows['conf_id'];
	mysqli_query($con, "UPDATE conference_reg_tb set payment_status ='1' where conf_id = '$conf_id' and user_email='$email'");
	$_SESSION['message_verify'] = '<div class="alert alert-success">Payment Process Successfully </div>';
	header('location:view_author.php');
}

?>conference_reg_tb
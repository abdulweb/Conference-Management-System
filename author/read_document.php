<?php
include '..\admin/includes/connection.php';
session_start();
$user_email = $_SESSION['user'];
if (empty($_SESSION['user']) || $_SESSION['user'] == '' || $_SESSION['user'] == null) {
    header('location:../index.php');
}

$get_id = $_GET['get_read'];
$query = mysqli_query($con, "SELECT * FROM upload_document where id = $get_id  and email = '$user_email'");
if (mysqli_num_rows($query) > 0) {
	$row = mysqli_fetch_assoc($query);
	$title = $row['document'];
    $rebrand = $title;
    $route = $rebrand;
  // echo "<script>alert('$route')</script>";
  
  
  header('Content-Type: application/pdf');
  header('Content-Disposition: inline; filename="'.basename($route).'"');
  header('Content-Lenght: '. filesize($route));
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  ob_clean();
  flush();
  readfile($route);
}
else{
	header('location:mypaper.php');
}

?>
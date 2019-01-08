<?php
$host = "localhost";
$username = "root";
$password = "root";
$db = "ocms";
$con = mysqli_connect($host,$username,$password,$db);
if (!$con) {
	echo "<script>alert('DB connection Fails')</script>";
	exit();
}
?>
<?php
$_SESSION['user'] = '';
unset($_SESSION['user']);
header('location:../index.php');
?>
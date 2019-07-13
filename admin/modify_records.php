<?php
include('includes/connection.php');
if(isset($_POST['edit_row']))
{
 $row=$_POST['row_id'];
 $title=$_POST['title'];
 $desc=$_POST['desc'];
 $dat_time = $_POST['date_time'];
 $venue = $_POST['venue'];
 $sep = explode('by', $dat_time);
 $real_date = $sep[0];
 $real_time = $sep[1];

 mysqli_query($con,"update conference_tb set conf_title='$title',conf_desc='$desc',conf_date='$real_date',conf_time='$real_time',conf_venue='$venue' where id='$row'");
 echo "success";
 exit();
}

if(isset($_POST['delete_row']))
{
 $row_no=$_POST['row_id'];
 mysqli_query($con, "delete from conference_tb where id ='$row_no'");
 echo "success";
 exit();
}

if(isset($_POST['insert_row']))
{
 $name=$_POST['name_val'];
 $age=$_POST['age_val'];
 $inst = mysqli_query($con,"insert into testing values('','$name','$age')");
 if ($inst) {
 	echo "insted";
 }
 else{
 	echo "not inserted";
 }
 echo mysqli_insert_id($con);
 exit();
}

//query for second tab
if(isset($_POST['edit_fee']))
{
 $row=$_POST['row_id'];
 $user=$_POST['user'];
 $author=$_POST['author'];
 mysqli_query($con,"update fee_tb set user='$user',author='$author' where id='$row'");
 echo "success";
 exit();
}

if(isset($_POST['edit_reviewer']))
{
 $row=$_POST['row_id'];
 $name=$_POST['name'];
 $field=$_POST['field'];
 mysqli_query($con,"update user_profile set fullname='$name',field='$field' where id='$row'");
 echo "success";
 exit();
}

?>
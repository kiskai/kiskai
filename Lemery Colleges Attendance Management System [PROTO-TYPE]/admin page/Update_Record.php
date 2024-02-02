<?php

include("conections.php");

$user_id = $_POST["user_id"];

$new_lname = $_POST["new_lname"];
$new_fname = $_POST["new_fname"];
$new_mname = $_POST["new_mname"];
$new_course = $_POST["new_course"];
$new_time = $_POST["new_time"];
$new_date = $_POST["new_date"];

mysqli_query($connections,"UPDATE tbl_attendance SET lname='$new_lname', fname='$new_fname', mname='$new_mname', course='$new_course', time='$new_time', date='$new_date' WHERE id='$user_id'");

	echo "<script language='javascript'>alert('New Record has been updated!')</script>";
	echo "<script>window.location.href='admin.php';</script>";
?>
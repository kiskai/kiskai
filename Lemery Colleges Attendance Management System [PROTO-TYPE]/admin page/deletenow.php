<?php
include("conections.php");

$user_id = $_POST["user_id"];

mysqli_query($connections, "DELETE FROM tbl_attendance WHERE id ='$user_id' ");

echo "<script language='javascript'>alert('New Record has been deleted!')</script>";
echo "<script>window.location.href='admin.php';</script>";

?>
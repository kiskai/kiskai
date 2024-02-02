<?php

$user_id = $_REQUEST["id"];

include("conections.php");

$query_delete = mysqli_query($connections, "SELECT *FROM tbl_attendance WHERE id = '$user_id' ");

while($row_delete = mysqli_fetch_assoc($query_delete)){
	$user_id = $row_delete["ID"];
	
	$db_lname = $row_delete["lname"];
	$db_fname = $row_delete["fname"];
	$db_mname = $row_delete["mname"];
	$db_course = $row_delete["course"];
	$db_time = $row_delete["time"];
	$db_date = $row_delete["date"];
	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Confirm</title>
</head>
<style>
	*{
		font-family: monospace;
	}
body {
	background-image:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url('background.jpg');
	background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
}
</style>
<body>
<div class="d-flex align-items-center justify-content-center" style="height: 100vh;">
<div class="container text-center text-white">
<h1 class='d-flex align-items-center justify-content-center'><?php echo "Are you sure you want to delete $db_lname?" ?></h1>
	<form method="POST" action="deletenow.php">

	<div class="form-group">
		<input type="hidden" class="form-control" name="user_id" value="<?php echo $user_id; ?>">
	</div>

	<div class="form-group">
		<input class="btn btn-danger pl-3 pr-3 pt-1 pb-1" type="submit" value="Yes">
		<a class="btn btn-primary  pl-3 pr-3 pt-1 pb-1" href ='admin.php'>No</a>
	</div>
</form>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
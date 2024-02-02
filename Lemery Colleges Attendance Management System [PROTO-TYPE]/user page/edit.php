<?php
$user_id = $_REQUEST["id"];

$user_id;

include("conections.php");

$get_record = mysqli_query($connections, "SELECT * FROM tbl_attendance WHERE id='$user_id'");

while($row_edit = mysqli_fetch_assoc($get_record)){
	
	$db_lname = $row_edit["lname"];
	$db_fname = $row_edit["fname"];
	$db_mname = $row_edit["mname"];
	$db_course = $row_edit["course"];
	$db_time = $row_edit["time"];
	$db_date = $row_edit["date"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>Edit</title>
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
<div class="container d-flex justify-content-center align-items-center text-white" style="min-height: 100vh;">
	<form method="POST" action="Update_Record.php">
	<div class="d-flex align-items-center justify-content-center">
		<h2>Update</h2>
	</div>
	<div class="form-group">
		<input type="hidden" class="form-control" name="user_id" value="<?php echo $user_id; ?>">
	</div>
	<div class="form-row">
    <div class="form-group col-md-6">
        <label for="name">Last name:</label>
		<input type="text" class="form-control" id="name" name="new_lname" value="<?php echo $db_lname; ?>">
    </div>
    <div class="form-group col-md-6">
        <label for="name">First name:</label>
		<input type="text" class="form-control" id="name" name="new_fname" value="<?php echo $db_fname; ?>">
        </div>
 </div>

	<div class="form-group">
		<label for="name">Middle name:</label>
		<input type="text" class="form-control" id="name" name="new_mname" value="<?php echo $db_mname; ?>">
	</div>

	<div class="form-group">
  <label for="course">Course: </label>
	<select name="new_course"id="course" class="form-control" value="<?php echo $db_course; ?>">
		<option value="" disabled selected>Course & Section</option>
		<option value="BSIT-1A">BSIT-1A</option>
		<option value="BSIT-1B">BSIT-1B</option>
		<option value="BSIT-1C">BSIT-1C</option>
		<option value="BSIT-1D">BSIT-1D</option>
		<option value="BSIT-1E">BSIT-1E</option>
		<option value="BSIT-1F">BSIT-1F</option>
		<option value="BSIT-2A">BSIT-2A</option>
		<option value="BSIT-2B">BSIT-2B</option>
		<option value="BSIT-2C">BSIT-2C</option>
		<option value="BSIT-3A">BSIT-3A</option>
		<option value="BSIT-3B">BSIT-3B</option>
		<option value="BSIT-3C">BSIT-3C</option>
		<option value="BSIT-4A">BSIT-4A</option>
		<option value="BSIT-4B">BSIT-4B</option>
		</select>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
		<label for="time">Time in:</label>
		<input type="text" class="form-control" name="new_time" id="time" placeholder="00:00:00" value="<?php echo $db_time; ?>"> 
    </div>
    <div class="form-group col-md-6">
		<label for="date">Date</label>
		<input type="date" class="form-control" id="date" name="new_date" value="<?php echo $db_time; ?>">
        </div>
 </div>

	<div class="form-group">
		<input class="btn btn-warning" type="submit" value="Update">
		<a class="btn btn-primary" href ='user.php'>Cancel</a>
	</div>

</form>
	</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
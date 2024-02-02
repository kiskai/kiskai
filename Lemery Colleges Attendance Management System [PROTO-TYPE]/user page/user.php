
<?php
$error= "";

$lname = $fname = $mname =  $course = $time = $date ="";
$lnameErr = $fnameErr = $mnameErr = $courseErr = $timeErr = $dateErr ="";

if($_SERVER['REQUEST_METHOD'] == "POST"){
	
if(empty($_POST["lname"])){
	$lnameErr = "Last Name is required!";
}else{
	$lname = $_POST["lname"];
}
if(empty($_POST["fname"])){
	$fnameErr = "First Name is required!";
}else{
	$fname = $_POST["fname"];
}
if(empty($_POST["mname"])){
	$mnameErr = "Middle Name is required!";
}else{
	$mname = $_POST["mname"];
}

if(empty($_POST["course"])){
	$courseErr = "Course is required!";
}else{
	$course = $_POST["course"];
}

if(empty($_POST["time"])){
	$timeErr = "Time in is required!";
}else{
	$time = $_POST["time"];
}
if(empty($_POST["date"])){
	$dateErr = "Date is required!";
}else{
	$date = $_POST["date"];
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>BSIT Attendance</title>
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
.error{
	color:red;
}
</style>
<body>
<div class="container d-flex justify-content-center align-items-center text-white" style="min-height: 100vh;">
<form method="POST" action="<?php htmlspecialchars("PHP_SELF");?>">

<div class="d-flex align-items-center justify-content-center flex-column">
<img class="img-flud" style="height:100px; width:auto;" src="lc1.png" alt="">
<h2>Attendance</h2>
<h4 class="mb-5">Bachelor of Information Technology Department</h4>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="name">Last name:</label>
        <input type="text" class="form-control" name="lname" id="name" placeholder="last name" value="<?php echo $lname; ?>">
        <span class="error"><?php echo $lnameErr; ?> </span>
    </div>
    <div class="form-group col-md-6">
        <label for="name">First name:</label>
        <input type="text" class="form-control" name="fname" id="name" placeholder="first name" value="<?php echo $fname; ?>">
        <span class="error"><?php echo $fnameErr; ?> </span>
        </div>
 </div>
 <div class="form-group">
    <label for="name">Middle name: </label>
    <input type="text" class="form-control" name="mname" id="name" placeholder="middle name" value="<?php echo $mname; ?>">
    <span class="error"><?php echo $mnameErr; ?> </span>
  </div>

  <div class="form-group">
  <label for="course">Course: </label>
	<select name="course" id="course" class="form-control" value="<?php echo $course; ?>">
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
    <span class="error"><?php echo $courseErr; ?> </span>
  </div>

 <div class="form-row">
    <div class="form-group col-md-6">
	<label for="time">Time in:</label>
	<input type="time" class="form-control" name="time" id="time" placeholder="00:00:00" value="<?php echo $time; ?>"> 
    <span class="error"><?php echo $timeErr; ?> </span>
    </div>
    <div class="form-group col-md-6">
		<label for="date">Date</label>
		<input type="date" class="form-control" id="date" name="date">
		<span class="error"><?php echo $dateErr; ?> </span>
        </div>
 </div>

  <input type="submit" class="btn btn-primary" name="submit" value=" Submit">
  <a class="text-decoration-none btn btn-danger" href="../logout.php">Log Out</a>

  <hr width="500px">
</form>
        </div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>



<?php
include("conections.php");

if($lname && $fname && $mname && $course && $time && $date){
	
	$query=mysqli_query ($connections, "INSERT INTO tbl_attendance(lname, fname, mname, course, time, date)
	VALUES ('$lname', '$fname', '$mname', '$course', '$time', '$date')");
	
	echo "Record has been added";
	
	echo "<script language='javascript'>alert('New Record has been inserted!')</script>";
	echo "<script>window.location.href='user.php';</script>";
}
$view_query = mysqli_query($connections, "SELECT * FROM tbl_attendance");

echo "<div style='display: flex; alig-items:center; justify-content:center; margin-bottom: 20px;'>";
echo "<table class='text-center table table-striped w-50' style='background-color:white; color:black;  border-radius: 10px; ' border='2' width='50%'>";
echo "<thead class='thead-dark'>
<tr class='p-5 text-center'>
<th style='width: 25%; padding: 10px;'>Last Name</th>
<th style='width: 25%; padding: 10px;'>First Name</th>
<th style='width: 25%; padding: 10px;'>Middle Name</th>
<th style='width: 35%; padding: 10px;'>Course</th>
<th style='width: 35%; padding: 10px;'>Time in</th>
<th style='width: 35%; padding: 10px;'>Date</th>
<th style='width: 35%; padding: 10px;'>Option</th>

</tr>
</thead";

while($row = mysqli_fetch_assoc($view_query)){
	
	$user_ID = $row["ID"];
	
	$db_lname = $row["lname"];
	$db_fname = $row["fname"];
	$db_mname = $row["mname"];
	$db_course = $row["course"];
	$db_time = $row["time"];
	$db_date = $row["date"];
	
	
	echo "<tr class='p-5 text-center'>
    <td>$db_lname</td>
	<td>$db_fname</td>
	<td>$db_mname</td>
    <td>$db_course</td>
    <td>$db_time</td>
	<td>$db_date</td>
	
	<td>
	
	<a style='text-decoration:none; color:blue; padding: 5px;' href='edit.php?id=$user_ID'>Update</a>
	&nbsp;
	</td>
	</tr>";
}

echo "</table>";
echo "</div>";

?>
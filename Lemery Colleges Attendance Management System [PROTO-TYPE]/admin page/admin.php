
<?php
  include("conections.php");
$error= "";

$lname = $fname = $mname =  $course = $time = $date ="";
$lnameErr = $fnameErr = $mnameErr = $courseErr = $timeErr =  $dateErr ="";

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
	<title>Admin</title>
</head>
<style>
    *{
        font-family: monospace;
    }
body{
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
<?php
    include("conections.php");

    $view_query = mysqli_query($connections, "SELECT * FROM tbl_attendance");

    echo "<div class='d-flex flex-column align-items-center justify-content-center text-center'>";
    echo "<form method='post' action='admin.php'>";
    echo "<label for='search' class='text-white mr-3 mt-5'>Search by Course & Section: </label>";
    echo "<input class='mt-5' type='text' name='search' id='search'>";
    echo "<input class='btn btn-secondary mb-2 ml-2 mt-1' type='submit' name='submit' value='Search'>";
    echo "</form>";
    echo "<table class='table table-striped w-50' style='background-color:white; color:black; border-radius: 10px; ' border='2' width='50%'>";
    echo "<thead class='thead-dark'>
    <tr>
    <th style='width: 25%; padding: 10px;'>Last Name</th>
    <th style='width: 25%; padding: 10px;'>First Name</th>
    <th style='width: 25%; padding: 10px;'>Middle Name</th>
    <th style='width: 35%; padding: 10px;'>Course</th>
    <th style='width: 35%; padding: 10px;'>Time in</th>
    <th style='width: 35%; padding: 10px;'>Date</th>
    <th style='width: 35%; padding: 10px;'>Option</th>
    
    </tr>
    </thead";

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['search'])) {
        $search = $_POST['search'];
        $query = mysqli_query($connections, "SELECT * FROM tbl_attendance WHERE course LIKE '%$search%'");
    
        if (mysqli_num_rows($query) == 0) {
            echo "<tr><td colspan='6'>No results found.</td></tr>";
        } else {
            while ($row = mysqli_fetch_array($query)) {
                echo "<tr>";
                echo '<td>'.$row["lname"].'</td>
                     <td>'.$row["fname"].'</td>
                     <td>'.$row["mname"].'</td>
                     <td>'.$row["course"].'</td>
                     <td>'.$row["time"].'</td>
                     <td>'.$row["date"].'</td>';
                echo '<td> 
                <div class="d-flex flex-row">
                        <a style="text-decoration:none; color:blue; padding: 5px;" href="edit.php?id='.$row["ID"].'">Update</a>
                        <a style="text-decoration:none; color:red; padding: 5px;" href="Confirmdelete.php?id='.$row["ID"].'">Delete</a>
                      </div>
                        </td>';
                echo '</tr>';
            }
        }
    } else {
        // Display all records if search input is empty
        while ($row = mysqli_fetch_assoc($view_query)) {

            $user_ID = $row["ID"];
    
            $db_lname = $row["lname"];
            $db_fname = $row["fname"];
            $db_mname = $row["mname"];
            $db_course = $row["course"];
            $db_time = $row["time"];
            $db_date = $row["date"];
    
            echo "<tr>
                    <td style='width: 14%; padding: 10px;'>$db_lname</td>
                    <td style='width: 14%; padding: 10px;'>$db_fname</td>
                    <td style='width: 14%; padding: 10px;'>$db_mname</td>
                    <td style='width: 25%; padding: 10px;'>$db_course</td>
                    <td style='width: 14%; padding: 10px;'>$db_time</td>
                    <td style='width: 14%; padding: 10px;'>$db_date</td>
                    <td>
                    <div class='d-flex flex-row'>
                        <a style='text-decoration:none; color:blue; padding: 5px;' href='edit.php?id=$user_ID'>Update</a>
                        <a style='text-decoration:none; color:red; padding: 5px;' href='Confirmdelete.php?id=$user_ID'>Delete</a>
                    </div>
                    </td>
                </tr>";
                
        }
    }

    echo '</table>';
    echo "<div class='d-flex align-items-center justify-content-center mt-3'>";
	echo "<a class='text-decoration-none btn btn-danger mb-5' href='../logout.php' style='margin-top: 10px;'>Log Out</a>";
    echo '</div>';
?>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>



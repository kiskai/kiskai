<?php
$username = $password = "";
 $userErr =   $passErr = "";
$host = "localhost";
$user = "root";
$password = "";
$db = "db_sagala";

$data = mysqli_connect($host, $user, $password, $db);
if ($data===false){
    die("connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST["username"])){
        $userErr = "User type is required!";
    }else{
        $username=$_POST["username"];
    }
    if(empty($_POST["password"])){
        $passErr = "Password is required!";
    }else{
        $password=$_POST["password"];
    } 
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<style>
body {
	background-image:linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url('background.jpg');
	background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

*{
	font-family: monospace;
}
</style>
<body>

    <div class="container p-4 rounded" style="max-width: 400px; margin: 100px auto; background-color: #fff; opacity: 0.7; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); padding: 25px;">
    <form action="#" method="POST">
            <div class="d-flex align-items-center justify-content-center flex-column">
            <img class="img-flud" style="height:100px; width:auto;" src="scs.png" alt="Lemery Colleges Computer Studies Department">
            <h2 style="font-family: monospace; text-align: center; padding: 0 0 10px 0;">Attendance</h2>
            </div>
            <div class="form-group">
                <label for="user" style="font-family: monospace; padding: 5px 0 5px 0; display: block;">User:</label>
                <input type="text" class="form-control username" name="username" id="user" placeholder="User type">
                <span class="error text-danger"><?php echo $userErr; ?></span>
            </div>

            <div class="form-group">
                <label for="pass" style="font-family: monospace; padding: 5px 0 5px 0; display: block;">Password:</label>
                <input type="password" class="form-control passWord" name="password" id="pass" placeholder="Password">
                <span class="error text-danger"><?php echo $passErr; ?></span><br><br>
                <div class="text-danger" style="text-align: center;">
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST"){
                        $sql = "SELECT * FROM login WHERE username = '".$username."' AND password='".$password."'";

                        $result=mysqli_query($data, $sql);
                        $row = mysqli_fetch_array($result);
                    
                        if ($row["usertype"] == "user"){
                            header("location: user page/user.php");
                        }
                        elseif($row["usertype"] == "admin")
                        {
                            header("location:admin page/admin.php");
                        }else{
                            echo "Please fill up both fields, Username or Password incorrect!";
                        }
                    }
                    ?>
            </div>
            </div>
            <div class="btn-container" style="display: flex; align-items: center; justify-content: center;">
                <input class="btn btn-dark login" type="submit" value="Log in">
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

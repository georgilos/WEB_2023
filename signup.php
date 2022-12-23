<?php
session_start();
 
include("connection.php");
include("functions.php");


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $username = $_POST['username'];
    $password = $_POST['password'];
	$email = $_POST['email'];

    if(!empty($username) && !empty($password) && !is_numeric($username) && password_strength($password))
    {

        //save to database
        $user_id = random_num(20);
        $query = "insert into users (user_id,username,password , email) values ('$user_id','$username','$password' , '$email')";

        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    }else
    {
        echo "Please enter some valid information!";
    }
}



?>


<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
</head>
<body>
    
<!-- diamorfosi selidas mesw css -->
	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 10px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: rosybrown;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Sign Up</div>

			<input id="text" type="text" name="username"><br>Enter Username<br>
			<input id="text" type="password" name="password"><br>Enter Password<br>
			<input id="text" type="text" name="email"><br>Enter E-Mail<br>

			<input id="button" type="submit" value="Sign Up"><br><br>
            <a href="login.php">Click to Login </a><br><br>


			
		</form>
	</div>
</body>
</html>
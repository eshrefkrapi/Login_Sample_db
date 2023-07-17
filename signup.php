<?php 
session_start();

	include("connect.php");
	include("function.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$name = $_POST['name'];
		$password = $_POST['password'];

		if(!empty($name) && !empty($password) && !is_numeric($name))
		{

			//save to database
			$user_id = random_num(5);
			$query = "insert into users (user_id,name,password) values ('$user_id','$name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
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

		background-color: grey;
		margin:auto;
		width: 300px;
		padding: 20px;
		transform:translateX(50%);
		transform:translateY(50%);
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="name" autocomplete="off" required ><br><br>
			<input id="text" type="password" name="password"  required pattern=".{8,}"><br><br>

			<input id="button" type="submit" value="Signup" style="margin-left:7em"><br><br>

			<a href="login.php" style="margin-left:6em;">Click to Login</a><br><br>
		</form>
	</div>
</body>
</html>
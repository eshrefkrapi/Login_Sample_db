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

			//read from database
			$query = "select * from users where name = '$name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "Wrong username or password!";
		}else
		{
			echo "Wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
		background-color: dodgerblue;
		border: none;
	}

	#box{

		background-color: mediumseagreen;
		margin: auto;
		width: 300px;
		padding: 20px;
    margin-top: 5em;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="name" autocomplete="off" required><br><br>
			<input id="text" type="password" name="password" required><br><br>

			<input id="button" type="submit" value="Login" style="margin-left:7em;"><br><br>

			<a href="signup.php" style="text-decoration:underline; color:slateblue; margin-left:6em; font-weight:bolder;">Click to Signup</a><br><br>
		</form>
	</div>
</body>
</html>
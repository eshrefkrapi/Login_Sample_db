<?php 
session_start();

	include("connect.php");
	include("function.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>MineIsOut</title>
</head>
<style type="text/css">

   a {
      text-decoration: none;
      background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin-left: 7em;
   }
   h3 {
      box-sizing:border-box;
      color: blue;
      width:10em;
   }
   h2{
      color:orangered;
      text-decoration: underline;

   }
   h1{
      color: turquoise;
   }
</style>
<body>

	
	<h3> Hello and Welcome <h2>@<?php echo $user_data['name']; ?>,</h2>
    <h1>entering here shows that you're a member of us!</h1></h3>
   <a href="logout.php" >Log out</a>
</body>
</html>
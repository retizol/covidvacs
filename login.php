<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//read from database
			$query = "SELECT * FROM users WHERE user_name = '$user_name' LIMIT 1";
			$result = mysqli_query($connect, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{
						$msg = "Success!";
						$_SESSION['user_id'] = $user_data['user_id'];
						
						header('refresh:1; url=index_connected.php'); //either profile or user_active_index
						
					}
				}
			}
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
</head>
<body>
	<nav id="nav2">
         <a class="logo2" href="index_connected.php">WowVacs</a>
      </nav><!--end of header-->

	<div class="loginbox">
		
		<form method="POST">
			<p>Log into your account</p><br>
			<input id="userlog" type="text" name="user_name" placeholder=" Username" ><br><br>
			<input id="passlog" type="password" name="password" placeholder=" Password"><br><br><br>

			<input id="signin" type="submit" value="Sign In"><br><br>
			<p><?php ini_set('display_errors', 0); ini_set('display_startup_errors', 0); echo $msg;?></p><br>

			<div id="dAcc">Don't have an account? <a href="signup.php">Sign up</a></div><br>
		</form>
	</div>
	<footer> 
			 Sources: <a href="https://doh.gov.ph" target="_blank">DOH</a> | <a href="https://who.int" target="_blank">WHO</a> | <a href="https://cdc.gov" target="_blank">CDC</a> | API <a href="https://disease.sh" target="_blank">disease.sh</a>
		</footer>
</body>
</html>
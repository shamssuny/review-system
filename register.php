<?php
include 'conn.php';
session_start();
if(isset($_SESSION['id'])){
	header("location:user.php");
}

if(isset($_POST['submit'])){

	$un = $_POST['name'];
	$up = md5($_POST['pass']);

	$c = "select * from user where user='$un'";
	$re = $pdo->query($c)->rowCount();
	if($re == 1){
		echo "<div style='margin:0;text-align:center;' class='alert alert-success'>Username Exixsts</div>";
	}else{

	$insert = "INSERT INTO user (user,pass) VALUES ('$un' , '$up')";

	if($pdo->query($insert)){
		echo "<div style='margin:0;text-align:center;' class='alert alert-success'>Registered Successfully</div>";
	}else{
		echo "Error when Registered";
	}
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<style type="text/css">
		.header{
			width: 100%;
			background-color: #518c5f;
			padding: 20px;
			display: inline-block;
			text-align: center;
			color: white;
		}
		.bo{
			width: 60%;
			margin:0 auto;
			background-color: #a3ccac;
			box-shadow: 0px 0px 66px 7px;
			padding: 20px;
			text-align: center;
		}
		.bo input{
			padding: 10px;
			border:none;
			margin:10px;
		}	
	</style>
</head>
<body>

<div class="header">
	<h2>Register For Get Review</h2>
	<a href="user.php" class="btn btn-success">HOME</a>
</div>


<div class="bo">
<form action="" method="POST">
	<label>Your User Name:</label><br>
	<input type="text" name="name" required=""><br>
	<label>Your Password:</label><br>
	<input type="password" name="pass" required=""><br>
	<input style="background-color: coral;color: white;" type="submit" name="submit" value="Register Now!">

</form>
</div>


</body>
</html>
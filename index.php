<?php
include 'conn.php';
session_start();
if(isset($_SESSION['id'])){
	header("location:user.php");
}

if(isset($_POST['submit']))
{
	$u = $_POST['user'];
	$p = md5($_POST['pass']);

	$qr = "select * from user where user='$u' and pass = '$p';";

	$count = $pdo->query($qr)->rowCount();

	if($count == 1){
		$res = $pdo->query($qr);
		foreach ($res as $value) {
			session_start();
			$_SESSION['u']=$value['user'];
			$_SESSION['id'] = $value['id'];
		}

		header("location:user.php");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Review Now!!</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<style type="text/css">
		.main{
			width: 40%;
			margin:0 auto;
			border:1px solid coral;
			border-radius: 20px;
			margin-top: 10%;
			padding: 20px;
			text-align: center;
			background-color: #518c5f;
			color: white;
		}
		.main input{
			margin:10px;
		}
	</style>
</head>
<body>


	<div class="main">
		<form class="form-group" action="" method="POST">
			<h2>Login/ Register to REVIEW NOW</h2>
			<input class="form-control" type="text" name="user"/>
			<input class="form-control" type="password" name="pass"/>
			<input class="btn btn-success" type="submit" name="submit" value="submit">
			<p>Register <a style="color: white;" href="register.php">-> Here</a></p>
		</form>
	</div>

</body>
</html>
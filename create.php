<?php
include 'conn.php';
session_start();
if(!isset($_SESSION['id'])){
	header("location:index.php");
}
$uid = $_SESSION['id'];

if(isset($_POST['submit'])){
	$nam = $_POST['name'];
	$des = $_POST['des'];

	$cr = "INSERT INTO event (name, des,uid) VALUES ('$nam','$des',$uid)";

	if($pdo->query($cr)){
		echo "<div style='margin:0;text-align:center;' class='alert alert-success'>Event Created Successfully</div>";
	}else{
		echo "Error Create Event";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Create a event</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<style type="text/css">
		.header{
			width: 100%;
			background-color: #518c5f;
			padding: 20px;
			display: inline-block;
		}
		.bo{
			width: 60%;
			margin:0 auto;
			background-color: #a3ccac;
			box-shadow: 0px 0px 66px 7px;
			padding: 20px;
			text-align: center;
		}
	</style>
</head>
<body>

<div class="header">
	<a style="float:right;" class="btn btn-success" href="logout.php">LogOut</a>
	<p style="font-size: 20px;color: white;font-weight: bold; float: right;padding-right: 20px;"><?php echo $_SESSION['u']; ?></p>
	<a class="btn btn-success" href="create.php">Create a event</a>
	<a href="user.php" class="btn btn-success">HOME</a>
	
</div>

<div class="bo">
	<form action="" method="POST">
		<label>Event Name:</label><br>
		<input type="text" name="name" placeholder="event name"><br>
		<label>Description:</label><br>
		<textarea name="des" placeholder="event description"></textarea><br>
		<input class="btn btn-warning" type="submit" name="submit" value="create event"/>
	</form>
</div>

</body>
</html>
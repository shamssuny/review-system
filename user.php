<?php
include 'conn.php';
session_start();

if(!isset($_SESSION['id'])){
	header("location:index.php");
}

if(isset($_GET['s'])){
	echo "<div style='margin:0;text-align:center;' class='alert alert-success'>Deleted Successfully</div>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>User Pannel</title>
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
		.bo p{
			font-weight: bold;
			font-size: 18px;
			margin:0;
			padding: 0;
		}
	</style>
</head>
<body>

<div class="header">
	<a style="float:right;" class="btn btn-success" href="logout.php">LogOut</a>
	<p style="font-size: 20px;color: white;font-weight: bold; float: right;padding-right: 20px;"><?php echo $_SESSION['u']; ?></p>
	<a class="btn btn-success" href="create.php">Create a event</a>
	<a class="btn btn-success" href="show.php">Your Events</a>
	<a href="user.php" class="btn btn-success">HOME</a>
	
	

</div>

<div class="bo">
	<?php
	$shev = "select * from event";

	$r = $pdo->query($shev);
	foreach ($r as $val) {
		$id = $val['evid'];
		echo "<p>".$val['name']."</p><b>".$val['des']."<b><br>";
		echo "<a href='rev.php?eid=$id'>make review</a><br><hr>";
	}
?>	
</div>


</body>
</html>
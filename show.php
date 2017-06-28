<?php
include 'conn.php';
session_start();
if(!isset($_SESSION['id'])){
	header("location:index.php");
}
$userid = $_SESSION['id'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Show</title>
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
	<a href="user.php" class="btn btn-success">HOME</a>
	
</div>


<div class="bo">
	<?php
		$shq = "select * from event where uid=$userid";
		$re = $pdo->query($shq);
		foreach ($re as $va) {
		$id = $va['evid'];
		echo "<p>".$va['name']."</p><b>".$va['des']."</b><br>";
		echo "<a href='see.php?uid=$userid&ev=$id'>See</a><hr>";
			}
	?>
</div>


</body>
</html>
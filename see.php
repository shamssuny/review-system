<?php
include 'conn.php';
session_start();
if(!isset($_SESSION['id'])){
	header("location:index.php");
}

	

if(isset($_GET['del'])){

	if($_GET['del']==1){
		$e = $_GET['evid'];
		$delr="delete from rating where evid=$e";
		$delc="delete from comment where evid=$e";
		$dele="delete from event where evid=$e";
		$pdo->query($delr);
		$pdo->query($delc);
		$pdo->query($dele);
		
		header("location:user.php?s=1");
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>see list</title>
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
	<?php
		$i = $_GET['uid'];
		$ed = $_GET['ev'];
	?>
	<a style="float: right;font-size: 14px;font-weight: bold;color: red;" href="see.php?del=1&evid=<?php echo $ed ?>">Delete Event</a>
	<?php
		
		$q =  "select * from event where uid=$i and evid=$ed";
		$e = $pdo->query($q);
		foreach ($e as $v) {
			echo "<h2>".$v['name']."</h2><b>Description: </b>".$v['des']."<br>";
		}

		$avg="select Avg(val) as r from rating where evid=$ed";
		$geravg = $pdo->query($avg);
		foreach ($geravg as $value) {
			echo "<b>Avg Rating:</b> ".$value['r']."<br>";
		}

		echo "<h3>Comments </h3>";
		$getcommnet = "select * from comment where evid=$ed";
		$re = $pdo->query($getcommnet);
		foreach ($re as $v) {
			$cmntr = $v['uid'];
			$findcomntr="select * from user where id=$cmntr";
			$n = $pdo->query($findcomntr);
			foreach ($n as $na) {
				echo "<b>User :</b> ".$na['user']."<br>";
			}
			echo "<b>Comment :</b>".$v['comm']."</br>";

			$rq = "select * from rating where evid=$ed and uid=$cmntr";
			$rr = $pdo->query($rq);
			foreach ($rr as $ve) {
				echo "<b>Rating:</b>".$ve['val']."<br><hr>";
			}
		} 
	?>
</div>

</body>
</html>
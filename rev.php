<?php
include 'conn.php';
session_start();
if(!isset($_SESSION['id'])){
	header("location:index.php");
}
$userid = $_SESSION['id'];
$eventid = $_GET['eid'];



if (isset($_POST['submit'])) {
	$chk = "select * from comment where uid=$userid and evid=$eventid";
	$num = $pdo->query($chk)->rowCount();
	if($num == 1){
		echo "<div style='margin:0;text-align:center;' class='alert alert-success'>Already Commented.</div>";
	}else{

	$com = $_POST['comm'];
	$r = $_POST['rat'];

	$inc = "insert into comment(comm,uid,evid) values ('$com',$userid,$eventid)";
	$inr = "insert into rating (val,uid,evid) values ($r,$userid,$eventid)";
	// $pdo->query($inc);
	// $pdo->query($inr);
	try{
		$pdo->query($inc);
		$pdo->query($inr);
		echo "<div style='margin:0;text-align:center;' class='alert alert-success'>Review Given Success</div>";
	}catch(Execption $e){
		echo "err:".$e->getMessage();
	}

}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Make review</title>
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
		if(isset($_GET['eid'])){
		$eid = $_GET['eid'];

		$eq= "select * from event where evid=$eid";
		$e=$pdo->query($eq);
		foreach ($e as $val) {
			echo "<b>Name: </b>".$val['name']."<br><b>Description:</b>".$val['des']."<br>";
		}
			}

		//get average rating
		$avg="select Avg(val) as r from rating where evid=$eventid";
		$geravg = $pdo->query($avg);
		foreach ($geravg as $value) {
			echo "<b>Avg Rating: </b>".$value['r']."<br>";
		}
		?>

		<form action="" method="POST">
			<input style="padding: 5px;" type="text" name="comm" placeholder="input comment" required="1"><br>
			<input type="radio" name="rat" value="1" required="">1
			<input type="radio" name="rat" value="2" required="">2
			<input type="radio" name="rat" value="3" required="">3
			<input type="radio" name="rat" value="4" required="">4
			<input type="radio" name="rat" value="5" re>5<br>
			<input class="btn btn-warning" type="submit" name="submit" value="Give Review">
		</form>
		<hr>
		<?php
		$getcommnet = "select * from comment where evid=$eventid";
		$re = $pdo->query($getcommnet);
		foreach ($re as $v) {
			$cmntr = $v['uid'];
			$findcomntr="select * from user where id=$cmntr";
			$n = $pdo->query($findcomntr);
			foreach ($n as $na) {
				echo "<b>User : </b>".$na['user']."<br>";
			}
			echo "<b>Comment :</b>".$v['comm']."<br>";

			$rq = "select * from rating where evid=$eventid and uid=$cmntr";
			$rr = $pdo->query($rq);
			foreach ($rr as $ve) {
				echo "<b>Rating:</b>".$ve['val']."<br><hr>";
			}
		}
	?>
</div>




</body>
</html>
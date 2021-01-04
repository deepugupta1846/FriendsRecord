<!DOCTYPE html>
<html>
<head>
	<title>Show All Friends</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">

		#container{
			max-width: 1200px;
			margin: auto;
			background: grey;
			overflow: auto;
		}
		#f{
			margin: 5px;
			border:5px solid #ccc;
			width: 400px;

		}
		#img{
			width: 100%
			height:auto;
		}
		#desc{
			padding: 15px;
			text-align: center;

		}
	</style>

</head>
<body>
	<?php
include 'navbar.html';
?>
<?php
try
{
	$con=new PDO("mysql:host=localhost;port=3308;dbname=friends","root","");
	$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$stmt=$con->prepare("select * from Records");
	$stmt->execute();
	$recs=$stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach ($recs as $r) {
		?>
		<div id="container">
			<div id="f">
				<div id="img"><?php echo '<img src="Photos/'.$r["SID"].'.jpg" width="400px" style="border-radius: 100%;"/>'?></div>
				<div id="desc">Name: <?php echo $r["SNAME"]; ?></div>
				<div id="desc">Ftaher's Name: <?php echo $r["FNAME"]; ?></div>
				<div id="desc">Mother's Name: <?php echo $r["MNAME"]; ?></div>
			</div>
		</div>
		<?php
	}
}catch(PDOException $e)
	{
		echo $e->getMessage();
	}
?>
<img src="">
</body>
</html>

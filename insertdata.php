<!DOCTYPE html>
<html>
<head>
	<title>Friends Records</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
	<?php
include 'navbar.html';
?>
	<div class="row m-5">
		<div class="col-md-3"></div>
			<form action="#" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<div><label>Enter  Name:</label></div>
					</div>
					<div class="col-md-6">
						<div><input type="text" name="sname"/></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div><label>Father's Name:</label></div>
					</div>
					<div class="col-md-6">
						<div><input type="text" name="fname"/></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div><label>Mother's Name:</label></div>
					</div>
					<div class="col-md-6">
						<div><input type="text" name="mname"/></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div><label>Photo Upload:</label></div>
					</div>
					<div class="col-md-6">
						<div><input type="file" name="uf"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div><input type="submit" value="Submit"  class="btn btn-outline-primary btn-block"/></div>
					</div>
				</div>
			</form>
			<?php
			if(isset($_POST['sname']))
			{
				try
			
			{
				$con=new PDO("mysql:host=localhost;port=3308;dbname=friends","root","");
				$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				$stmt=$con->prepare("insert into Records values(0,?,?,?)");
				$stmt->bindvalue(1,htmlspecialchars($_POST['sname']),PDO::PARAM_STR);
				$stmt->bindvalue(2,htmlspecialchars($_POST['fname']),PDO::PARAM_STR);
				$stmt->bindvalue(3,htmlspecialchars($_POST['mname']),PDO::PARAM_STR);
				$stmt->execute();
				echo "Submited Successfully";
				$recs=$con->prepare("select SID from Records where SNAME=? AND FNAME=?");
				$recs->bindvalue(1,htmlspecialchars($_POST['sname']),PDO::PARAM_STR);
				$recs->bindvalue(2,htmlspecialchars($_POST['fname']),PDO::PARAM_STR);
				$recs->execute();
				$r=$recs->fetch();
				move_uploaded_file($_FILES['uf']['tmp_name'],'Photos/'.$r['SID'].'.jpg');
				echo "Photo Added  Successfully";
			}catch(PDOException $y)
			{
				echo $y->getMessage();
			}
		}
			?>
	</div>
</body>
</html>
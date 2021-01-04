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
			}catch(PDOException $r)
			{
				echo $r->getMessage();
			}
		}
			?>
<?php
	require_once('db_conn.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style type="text/css">
		body{
			background-color: beige;
		}
		#login-form{
			background-color: #b0d6ff;
			max-width: 300px;
			margin: 0 auto;
			padding: 5px;
			border-radius: 10px;
			box-shadow: 2px 3px 5px #519bea;
		}
	
		#login-form input[type="email"], #login-form input[type="password"]{
			margin: 2px;
			width : 94%;			
		}
		
		#login-form label{
			color: #0d247d;
			margin: 2px;
			font-size: 18px;
		}
		#gen-opt{
			margin: 5px 10px;
		}

		#login-form input[type="submit"]{
		    width: 30%;
		    height: 30px;
		    margin: 0 35%;
			margin: 12px 35%;
			border-radius: 5px;
			background-color:
			blanchedalmond;
		}
		#login-form input[type="submit"]:hover{
			background-color : #d2c0a5;
		}
	</style>
</head>
<body>
	<div id="login-form">
		<form action="admin.php" method="POST">
		
			<label>Enter your email</label><br/>
			<input type="email" placeholder="please enter your email" name="email"><br/>

			<label>Enter password</label><br/>
			<input type="password" placeholder="please enter your password"name="password"><br/>

			<input type="submit" value="Login" name="btn-login" />
		</form>
	</div>
	
	<?php
		if(isset($_POST['btn-login'])){
			
			if(isset($_POST['email'])){
				$email = $_POST['email'];
			}
			if(isset($_POST['password'])){
				$password = sha1($_POST['password']);
			}
			
			$sql = "SELECT * FROM tbl_admin WHERE u_email = ? AND u_password = ?";
			$stmt = mysqli_prepare($conn, $sql);
			mysqli_stmt_bind_param($stmt, "ss", $email, $password);
			mysqli_stmt_execute($stmt);
			
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_affected_rows($stmt) > 0){
				//Redirecting to home page.
				ob_start();
				header("Location:home.php");
				ob_end_flush();
				die();//exit();
			} else{
				echo "Invalid email/password";
			}
		}
	?>
</body>
</html>
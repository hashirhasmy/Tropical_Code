<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>

<?php
	require_once('db_conn.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tropical Code</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="style_new.css">
</head>
<body>

	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif ?>
	</div>
	<br>

	<form action="index.php" method="POST">
		<lable>Enter your name</lable> <br/>
		<input type="text" placeholder="please enter your name" name="name"><br/> <br/>
		<lable>Enter your Email</lable> <br/>
		<input type="text" placeholder="please enter your email" name="email"><br/> <br/>
		<lable>Enter Password</lable><br/>
		<input type="password" placeholder="please enter your password"name="password"><br/><br/>
		<lable>Enter mobile no</lable> <br/>
		<input type="mobile" placeholder="mobile" name="mobile"><br/> <br/>
		<label>Enter dob</label><br/>
		
		<label for="male">Male</label>
		<input type="radio" name="gender" value="male" id="male">
		<label for="female">Female</label>
		<input type="radio" name="gender" value="female" id="female">
		<label for="other">Other</label>
		<input type="radio" name="gender" value="other" id="other">
		<br/>
		<br/>
		<label>Address</label><br>
		<input type="text" placeholder="enter your address" name="address"><br><br>
		<label>Item</label><br>
		<input type="text" placeholder="enter the item" name="item"><br><br>
		<label>Code</label><br>
		<input type="text" placeholder="enter the item code" name="code"><br><br>
		<input type="submit" value="submit" name="btn-submit">
		
</form>
<br>
		<?php
				

				// Storing data in database.*/

				if(isset($_POST['btn-submit'])){
			if(isset($_POST['name'])){
				$name = $_POST['name'];
			} 
			if(isset($_POST['email'])){
				$email = $_POST['email'];
			}
			if(isset($_POST['password'])){
				$pass = sha1($_POST['password']);
			}
			if(isset($_POST['mobile'])){
				$mobile = $_POST['mobile'];
			}
			if(isset($_POST['gender'])){
				$gender = $_POST['gender'];
			}
			if(isset($_POST['address'])){
				$address = $_POST['address'];
			}
			if(isset($_POST['item'])){
				$item = $_POST['item'];
			}
			if(isset($_POST['code'])){
				$code = $_POST['code'];
			}

			//Storing data in database.
			$sql = @"INSERT INTO tbl_order 
					(u_name, u_email, u_password, u_mobile, u_gender, u_address, u_item, u_code) 
					VALUES(?,?,?,?,?,?,?,?)";
			
			$stmt = mysqli_prepare($conn, $sql);
			mysqli_stmt_bind_param($stmt, "ssssssss", $name, $email, $pass, $mobile, $gender, $address, $item, $code);
			mysqli_stmt_execute($stmt);
			
			if(mysqli_stmt_affected_rows($stmt) > 0){
				echo "Record added succssfully";

				//Redirecting to home page.
				ob_start();
				header("Location:home.php");
				ob_end_flush();
				die();//exit();
			} else{
				echo "Error ".mysqli_stmt_error($stmt);
			}
		}



			?>

			 <!-- Footer-->
        <footer class="bg-light py-5" style="background: linear-gradient(90deg,#d5dca5, #58a895);">
            <div class="container"><div class="small text-center text-muted" style="font-size: 20px; font-family: emoji;">© Copyright 2020. Tropical Code PLC. All Rights Reserved.</div></div>
        </footer>

	
		
</body>
</html>
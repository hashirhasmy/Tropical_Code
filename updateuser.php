<?php
	require_once('db_conn.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tropical Code</title>
	<style type="text/css">
		body{
			background-color: beige;
		}
		#upd-form{
			background-color: #b0d6ff;
			max-width: 300px;
			margin: 0 auto;
			padding: 5px;
			border-radius: 10px;
			box-shadow: 2px 3px 5px #519bea;
		}
		#upd-form input[type="text"], #upd-form input[type="mobile"],
		#upd-form input[type="email"], #upd-form input[type="password"]{
			margin: 2px;
			width : 94%;			
		}
		
		#upd-form label{
			color: #0d247d;
			margin: 2px;
			font-size: 18px;
		}
		#gen-opt{
			margin: 5px 10px;
		}

		#upd-form input[type="submit"]{
		    width: 30%;
		    height: 30px;
		    margin: 0 35%;			
		}
	</style>
</head>
<body>
	
	<?php
	
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			
			//Storing data in database.
			$sql = @"SELECT u_id, u_name, u_email, u_password, u_mobile, u_gender, u_address, u_item, u_code FROM tbl_order 
						WHERE u_id = ?";
			
			$stmt = mysqli_prepare($conn, $sql);
			mysqli_stmt_bind_param($stmt, "i", $id);
			mysqli_stmt_execute($stmt);
			
			mysqli_stmt_bind_result($stmt, $id, $username, $email, $password, $mobile, $gender, $address, $item, $code);
			mysqli_stmt_store_result($stmt);
			
			if(mysqli_stmt_affected_rows($stmt) > 0){
				while(mysqli_stmt_fetch($stmt)){
			?>
			
				<div id="upd-form">
					<form action="updateuser.php?id=<?php echo $id; ?>" method="POST">
						<lable>Enter your name</lable><br/>
						<input type="text" placeholder="please enter your name" name="name" value="<?php echo $username; ?>"><br/>

						<label>Enter your email</label><br/>
						<input type="text" placeholder="please enter your email" name="email" value="<?php echo $email; ?>"><br/>

						<label>Enter password</label><br/>
						<input type="password" placeholder="please enter your password"name="password" value="<?php echo $password; ?>"><br/>

						<label>Enter mobile no</label><br/>
						<input type="mobile" placeholder="mobile" name="mobile" value="<?php echo $mobile; ?>">
						<br/>

						<label>Enter dob</label><br/>
						<div id="gen-opt">
							
							<label for="male">Male</label>
							<input type="radio" name="gender" value="male" id="male" <?php if(strtolower($gender) == "male"){ echo "checked"; }?>>
							<label for="female">Female</label>
							<input type="radio" name="gender" value="female" id="female" <?php if(strtolower($gender) =="female"){ echo "checked"; }?>>
							<label for="other">Other</label>
							<input type="radio" name="gender" value="other" id="other" <?php if(strtolower($gender) == "other"){ echo "checked"; }?>>
						</div>

						<label>Address</label><br>
						<input type="text" placeholder="enter your address" name="address" value="<?php echo $address; ?>"><br><br>
						<label>Item</label><br>
						<input type="text" placeholder="enter the item" name="item" value="<?php echo $item; ?>"><br><br>
						<label>Code</label><br>
						<input type="text" placeholder="enter the item code" name="code" value="<?php echo $code; ?>"><br><br>

						<input type="submit" value="Update" name="btn-update" />
					</form>
				</div>
			<?php
				}
			} else{
				echo "Error ".mysqli_stmt_error($stmt);
			}
		
		
			//Updating a record.
			if(isset($_POST['btn-update'])){
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
				
				$sql = @"UPDATE tbl_order SET 
						u_name = ?, u_email = ?, u_password = ?,
						u_mobile = ?, u_gender = ?, u_address = ?, u_item = ?, u_code = ? WHERE u_id = ?";
				
				$stmt = mysqli_prepare($conn, $sql);
				mysqli_stmt_bind_param($stmt, "ssssssssi", $name, $email, $pass, $mobile, $gender, $address, $item, $code, $id);
				mysqli_stmt_execute($stmt);
				
				if(mysqli_stmt_affected_rows($stmt) > 0){
					echo "<b>Successfully updated</b>";
				} else {
					echo "<b>Error </b> ".mysqli_stmt_error($stmt);
				}
				
			}

		}
	?>
</body>
</html>
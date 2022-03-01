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
	<style>
		table{
			border: 1px solid #000;
			border-collapse: collapse;
		}
		td,tr,th{
			border: 1px solid #045704;
		}
		td, th{
			padding: 5px;
			font-size: 20px;
		}
		table{
			margin: 20px auto;
			border-radius: 5px;
		}
		tr:first-child, tr:first-child:hover{
			background-color: #86db90;
		}
		tr{
			background-color: beige;
		}
		tr:hover{
			background-color: #ffffce;
		}
		#d>svg{
			width: 25px;
			color: red;
		}
		#e>svg{
			width: 25px;
			color: #f700ff;
		}
	</style>
</head>
<body>

	<!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="index.html">Tropical Code|Home</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="about.html">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="services.html">Services</a></li>
                        <li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          Products
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          <a class="dropdown-item" href="shoes.html">Shoes</a>
				          <a class="dropdown-item" href="watches.html">Watches</a>
				          <div class="dropdown-divider"></div>
				          <a class="dropdown-item" href="clothes.html">Clothes</a>
				        </div>
				      	</li>
                        <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="order.html">Order</a></li> -->
                        <li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          Orders
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          <a class="dropdown-item" href="register.php">Register</a>
				          <a class="dropdown-item" href="login.php">Login</a>
				          <div class="dropdown-divider"></div>
				          <a class="dropdown-item" href="index.php">Buy_Now</a>
				        </div>
				      	</li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <br>
        <br>
        <br>
        <br><br>




	<section>
		<div>
			<h1 style="font-style:italic; font-size:28px; background:#CCC; border:#000; text-align:center;">Welcome to View Orders</h1>
		</div>
	</section>
	<section>
		<table>
			<tr>
				<th>Username</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>Gender</th>
				<th>Address</th>
				<th>Item</th>
				<th>Code</th>

				<th id="e"><svg xmlns="http://www.w3.org/2000/svg"   viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon></svg></th>
				<th id="d"><svg xmlns="http://www.w3.org/2000/svg"   viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></th>
			</tr>
			<?php
				$sql = "SELECT u_id, u_name, u_email, u_mobile, u_gender, u_address, u_item, u_code FROM tbl_order";
				$stmt = mysqli_prepare($conn, $sql);

				mysqli_stmt_bind_result($stmt, $id, $username, $email, $mobile, $gender, $address, $item, $code);

				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				if(mysqli_stmt_affected_rows($stmt) > 0){
					
					while(mysqli_stmt_fetch($stmt)){
						echo "<tr>
								<td>".$username."</td>
								<td>".$email."</td>
								<td>".$mobile."</td>
								<td>".$gender."</td>
								<td>".$address."</td>
								<td>".$item."</td>
								<td>".$code."</td>
								<td> <a href='updateuser.php?id=".$id."'>Edit</a></td>
								<td> <a href='deleteuser.php?id=".$id."'>Delete</a></td>
							</tr>";
					}

				} else {
					//No records.
				}
			?>
		</table>
	</section>
	<br>
	<br>
	<br>
	<br>
	<br><br><br><br><br><br>


	 <!-- Footer-->
        <footer class="bg-light py-5" style="background: linear-gradient(90deg,#d5dca5, #58a895);">
            <div class="container"><div class="small text-center text-muted" style="font-size: 20px; font-family: emoji;">© Copyright 2020. Tropical Code PLC. All Rights Reserved.</div></div>
        </footer>

	<script src="js/jquery-3.5.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/script.js"></script>
	<script src="js/main.js"></script>
</body>
</html>